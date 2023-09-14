<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->paginate(5); 

            return view ('admin/loans',['dataUser'=>$dataUser,'dataLoans'=>$dataLoans]);	
        }
        else
        {
            return redirect('/')->with('warning','Session expired.');;
		}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
