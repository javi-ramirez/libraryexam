<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use App\Models\Book;
use App\Models\NotificationsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Twilio\Rest\Client;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (session()->has('s_identificador') ) 
        {
            $consultingSession = DB::table('user')
            ->select('id')
            ->where('email','=',session('s_identificador'))
            ->get();

            $idJson = json_decode(json_encode($consultingSession),true);
            $idSession = implode($idJson[0]);
            
            $dataUser = DB::table('user')
            ->select('id','name','email')
            ->where('id', '=', $idSession)
            ->get();

            $dataLoans = Loans::select(
                'loans.id',
                'user.name as userName',
                'books.name as bookName',
                DB::raw('DATE_FORMAT(loan_date, "%M %e, %Y at %h:%i:%s %p") as loan_date'),
                DB::raw('IF(loans.status = 1, "On load", "Returned") AS status'),
                DB::raw('DATE_FORMAT(return_date, "%M %e, %Y at %h:%i:%s %p") as return_date'),
                'loans.created_at',
                'loans.updated_at'
            )
            ->join('user', 'loans.user_id', '=', 'user.id') // Corregido 'user' a 'users'
            ->join('books', 'loans.book_id', '=', 'books.id')
            ->where('books.status','!=',0)
            ->where('user.status','!=',0)
            ->orderBy('loans.id', 'desc')
            ->paginate(5); 

            $dataLoansUser = Loans::select(
                'loans.id',
                'user.name as userName',
                'books.name as bookName',
                DB::raw('DATE_FORMAT(loan_date, "%M %e, %Y at %h:%i:%s %p") as loan_date'),
                DB::raw('IF(loans.status = 1, "On load", "Returned") AS status'),
                DB::raw('DATE_FORMAT(return_date, "%M %e, %Y at %h:%i:%s %p") as return_date'),
                'loans.created_at',
                'loans.updated_at'
            )
            ->join('user', 'loans.user_id', '=', 'user.id') // Corregido 'user' a 'users'
            ->join('books', 'loans.book_id', '=', 'books.id')
            ->where('books.status','!=',0)
            ->where('user.status','!=',0)
            ->where('loans.status','!=',0)
            ->where('user.id','=',$idSession)
            ->orderBy('loans.id', 'desc')
            ->paginate(5); 

            $dataBooks = Book::select(
                'books.id',
                'books.name',
                'books.author',
                DB::raw('DATE_FORMAT(published_date, "%M, %Y") as published_date')
            )
            ->where('books.status', '!=', 0)
            ->get();

            return view ('admin/loans',['dataUser'=>$dataUser,'dataLoans'=>$dataLoans,'dataBooks'=>$dataBooks,'dataLoansUser'=>$dataLoansUser]);	
        }
        else
        {
            return redirect('/')->with('warning','Session expired.');;
		}
    }

    public function messagesender($idLoan){
        //
        if (session()->has('s_identificador') ) 
		{
            try
            {
                DB::beginTransaction();

                $consultingSession = DB::table('user')
                ->select('phone')
                ->where('email','=',session('s_identificador'))
                ->get();

                $idJson = json_decode(json_encode($consultingSession),true);

                $consultingIdBook = DB::table('loans')
                ->select('book_id')
                ->where('id','=',$idLoan)
                ->get();

                $idJsonBook = json_decode(json_encode($consultingIdBook),true);
                $idBook = implode($idJsonBook[0]);

                $Loans = Loans::find($idLoan);
                $Loans->status = 0;
                $Loans->return_date = Carbon::now();
                $Loans->updated_at = Carbon::now();
                
                if($Loans->save()){

                    $existenceNotification = DB::table('notifications_users')
                    ->select('notifications_users.id as notiId',
                            'notifications_users.status',
                            'books.name as booksName',
                            'user.id as userId',
                            'user.phone',
                            'user.email',
                            'user.name as userName'
                    )
                    ->join('user', 'notifications_users.user_id', '=', 'user.id')
                    ->join('books', 'notifications_users.book_id', '=', 'books.id')
                    ->where('notifications_users.status','!=',0)
                    ->where('notifications_users.book_id','=',$idBook)
                    ->get();

                    foreach($existenceNotification as $notification)
                    {
                        $sid = env('TWILIO_SID');
                        $token = env('TWILIO_AUTH_TOKEN');
                        $twilio = new Client($sid, $token);

                        $msj = "Dear ".$notification->userName." with email: ".$notification->email.", we are pleased to notify you that the book ".$notification->booksName." is once again available for loan.";
                        // Send menssage SMS
                        /*$message = $twilio->messages
                        ->create("+52".$notification->phone, [
                            "from" => env('TWILIO_PHONE_NUMBER'), 
                            "body" => $msj
                        ]);*/

                        //Send WhatsApp
                        $message = $twilio->messages->create(
                            "whatsapp:+521".$notification->phone,
                            [
                                "from" => "whatsapp:".env('TWILIO_WHATS_NUMBER'),
                                "body" => $msj
                            ]
                        );


                        $Notifications = NotificationsUsers::find($notification->notiId);
                        $Notifications->status = 0;
                        $Notifications->updated_at = Carbon::now();
                        $Notifications->save();
                    }
                    
                    DB::commit(); 
                    return redirect ('admin/loans')->with('message','Successful loan return.');
                }else{
                    DB::rollback();
                    return redirect('admin/loans')->with('warning','Error when trying to return the loan. Please try again.');
                } 
            }catch (\Exception $e) {
                echo $e;
                die();
                return redirect('admin/loans')->with('warning','Error when trying to return the loan. Please try again.');
            }
        } else{
            return redirect('/')->with('warning','Session expired.');;
		}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $data)
    {
        //
        if (session()->has('s_identificador') ) 
		{
            try
            {
                DB::beginTransaction();

                $consultingSession = DB::table('user')
                ->select('id')
                ->where('email','=',session('s_identificador'))
                ->get();

                $idJson = json_decode(json_encode($consultingSession),true);
                $idSession = implode($idJson[0]);

                $idBook = $data->input('txtBookLoan');

                $isLoan = Book::select(
                    DB::raw('IF(EXISTS(SELECT 1 FROM loans WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), "1", "0") AS status'),
                )
                ->join('literary_genres', 'books.id', '=', 'literary_genres.book_id')
                ->join('categories', 'literary_genres.category_id', '=', 'categories.id')
                ->where('books.status','!=',0)
                ->where('books.id','=',$idBook)
                ->groupBy('books.id', 'books.name', 'author', 'published_date', 'books.created_at', 'books.updated_at')
                ->get();    
    
                foreach($isLoan as $loan)
                {
                    if($loan->status == 1)
                    {
                        DB::rollback();
                        return redirect ('admin/loans')->with('warning','The book is on loan.');
                    }
                }

                $Loan = new Loans();
                $Loan->book_id = $idBook;
                $Loan->user_id = $idSession;
                $Loan->loan_date = Carbon::now();
                $Loan->status = 1;
                $Loan->created_at = Carbon::now();
                $Loan->updated_at = Carbon::now();
                
                if($Loan->save()){
                    DB::commit(); 
                    return redirect ('admin/loans')->with('message','Successful loan registration.');
                }else{
                    DB::rollback();
                    return redirect('admin/loans')->with('warning','Error when trying to add the loan. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/loans')->with('warning','Error when trying to add the loan. Please try again.');
            }
        } else{
            return redirect('/')->with('warning','Session expired.');;
		}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Loans $loans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loans $loans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loans $loans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loans $loans)
    {
        //
    }
}
