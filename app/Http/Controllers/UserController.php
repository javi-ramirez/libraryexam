<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.login');
    }

    public function viewUsers()
    {
        //
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

            $dataUsers = DB::table('user')
            ->select(
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            )
            ->where('status','!=',0)
            ->paginate(5);     

            return view ('admin/users',['dataUser'=>$dataUser,'dataUsers'=>$dataUsers]);	
        }
        else
        {
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

                $existenceEmail = DB::table('user')
                ->select('id','email')
                ->get();

                foreach($existenceEmail as $email)
                {
                    if($email->email == $data->input('txtEmailUser'))
                    {
                        DB::rollback();
                        return redirect ('admin/users')->with('warning','Duplicate email. The email of the user is already registered.');
                    }
                }
                
                if(DB::table('user')->insert([
                    'name' => $data->input('txtNameUser'),
                    'email' => $data->input('txtEmailUser'),
                    'password' => md5($data->input('txtPasswordUser')),
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ])){
                    
                    DB::commit(); 
                    return redirect ('admin/users')->with('message','Successful user registration.');
                }else{
                    DB::rollback();
                    return redirect('admin/users')->with('warning','Error when trying to add the user. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/users')->with('warning','Error when trying to add the user. Please try again.');
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
