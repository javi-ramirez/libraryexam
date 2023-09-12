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
        return view('admin/dashboard');
    }

    public function validateUser (Request $datos)
    {
        $emailUser = $datos->input ('txtEmail');
        $passwrodUser = md5($datos->input ('txtPassword'));

        $consultingDataUser = DB::table('User')
        ->select('email', 'password')
        ->where('email', '=', $emailUser)
        ->where('password', '=', $passwrodUser)
        ->get();

        if ($consultingDataUser!="[]")
        {
            session(['s_identificador'=>$emailUser]);
            return redirect('admin/dashboard')->with('message','Successful access.');
        }
        else
        {
            return redirect('/')->with('warning','Incorrect email or password.');
        }
    }
}
