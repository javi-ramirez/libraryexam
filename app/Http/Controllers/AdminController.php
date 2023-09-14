<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
            ->where('status','!=',0)
            ->where('id', '=', $idSession)
            ->get();

            $recordsBooks = DB::table('books')
            ->where('status','!=',0)
            ->count();

            $recordsLoans = DB::table('loans')     
            ->join('books', 'books.id', '=', 'loans.book_id')
            ->join('user', 'user.id', '=', 'loans.user_id')
            ->where('books.status','!=',0)
            ->where('user.status','!=',0)
            ->count();

            $recordsCategories = DB::table('categories')
            ->where('status','!=',0)
            ->count();

            $recordsUsers = DB::table('user')
            ->where('status','!=',0)
            ->count();

            return view ('admin/dashboard',['dataUser'=>$dataUser,'recordsBooks'=>$recordsBooks,'recordsLoans'=>$recordsLoans, 'recordsCategories'=>$recordsCategories, 'recordsUsers'=>$recordsUsers]);	
        }
        else
        {
            return redirect('/')->with('warning','Session expired.');;
		}
    }

    public function validateUser (Request $data)
    {
        $emailUser = $data->input ('txtEmail');
        $passwrodUser = md5($data->input ('txtPassword'));

        $consultingDataUser = DB::table('User')
        ->select('email', 'password')
        ->where('email', '=', $emailUser)
        ->where('password', '=', $passwrodUser)
        ->where('status','!=',0)
        ->get();

        if ($consultingDataUser!="[]")
        {
            session(['s_identificador'=>$emailUser]);
			return redirect ('admin/dashboard')->with('message','Successful access.');
        }
        else
        {
            $incorrectPass = DB::table('User')
            ->select('email', 'password')
            ->where('email', '=', $emailUser)
            ->where('password', '!=', $passwrodUser)
            ->where('status','!=',0)
            ->get();

            if ($incorrectPass!="[]")
            {
                DB::rollback();
                return redirect('/')->with('warning','Incorrect password. Please try again.');
            }

            $removed = DB::table('User')
            ->select('email', 'password')
            ->where('email', '=', $emailUser)
            ->where('password', '=', $passwrodUser)
            ->where('status','=',0)
            ->get();
            
            if ($removed!="[]"){
                return redirect('/')->with('warning','The account has been removed.');
            }

            $invalidEmail = DB::table('User')
            ->select('email', 'password')
            ->where('email', '!=', $emailUser)
            ->where('status','!=',0)
            ->get();
            
            if ($invalidEmail!="[]"){
                return redirect('/')->with('warning','The email is invalid.');
            }

            return redirect('/')->with('warning','The email is invalid.');
        }
    }

    public function logOut (){
        
        Session()->flush();
        return redirect('/')->with('message','Closed session.');
    }
}
