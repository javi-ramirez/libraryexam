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
            ->where('id', '=', $idSession)
            ->get();

            $recordsBooks = DB::table('books')
            ->count();

            $recordsLoans = DB::table('loans')
            ->count();

            $recordsCategories = DB::table('categories')
            ->count();

            $recordsUsers = DB::table('user')
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
            return redirect('/')->with('warning','Incorrect email or password.');
        }
    }

    public function logOut (){
        //Matamos todos los datos de la sesion
        Session()->flush();
        return redirect('/')->with('message','Closed session.');
    }
}
