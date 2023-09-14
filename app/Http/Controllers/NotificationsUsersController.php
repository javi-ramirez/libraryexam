<?php

namespace App\Http\Controllers;

use App\Models\NotificationsUsers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NotificationsUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

                $isLoanUser = Book::select(
                    DB::raw('IF(EXISTS(SELECT 1 FROM loans WHERE book_id = books.id AND return_date IS NULL AND loans.status = 1 AND loans.user_id = '.$idSession.'), "1", "0") AS status'),
                )
                ->join('literary_genres', 'books.id', '=', 'literary_genres.book_id')
                ->join('categories', 'literary_genres.category_id', '=', 'categories.id')
                ->where('books.status', '!=', 0)
                ->where('books.id', '=', $idBook)
                ->groupBy('books.id', 'books.name', 'author', 'published_date', 'books.created_at', 'books.updated_at')
                ->get();
    
                foreach($isLoanUser as $loan)
                {
                    if($loan->status == 1)
                    {
                        DB::rollback();
                        return redirect ('admin/loans')->with('warning','You already have this book on loan. To receive notification of its availability you must return it.');
                    }
                }

                $consultingNotiUserBook = DB::table('notifications_users')
                ->select('id', 'status')
                ->where('book_id', '=', $idBook)
                ->where('user_id', '=', $idSession)
                ->where('status','!=',0)
                ->get();

                if ($consultingNotiUserBook!="[]")
                {
                    return redirect ('admin/loans')->with('warning','You have previously registered a notification for this book. You will be notified when it becomes available.');
                }

                $Notification = new NotificationsUsers();
                $Notification->book_id = $idBook;
                $Notification->user_id = $idSession;
                $Notification->status = 1;
                $Notification->created_at = Carbon::now();
                $Notification->updated_at = Carbon::now();
                
                if($Notification->save()){
                    DB::commit(); 
                    return redirect ('admin/loans')->with('message','Successful notification registration.');
                }else{
                    DB::rollback();
                    return redirect('admin/loans')->with('warning','Error when trying to save the notification. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/loans')->with('warning','Error when trying to save the notification. Please try again.');
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
    public function show(NotificationsUsers $notificationsUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotificationsUsers $notificationsUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotificationsUsers $notificationsUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotificationsUsers $notificationsUsers)
    {
        //
    }
}
