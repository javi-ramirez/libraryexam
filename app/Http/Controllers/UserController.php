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
                'phone',
                'created_at',
                'updated_at',
            )
            ->where('status','!=',0)
            ->orderBy('id', 'desc')
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
                ->where('status','!=',0)
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
                    'phone' => $data->input('txtPhoneUser'),
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
    public function show(Request $data)
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
                
                $dataUser = DB::table('user')
                ->select('id','name','email','phone','password')
                ->where('id', '=', $idSession)
                ->get();

                
                return view ('admin/updateusers',['dataUser'=>$dataUser]);	
            }catch (\Exception $e) {
                return redirect('admin/users')->with('warning','Error loading user information. Please try again.');
            }
        } else{
            return redirect('/')->with('warning','Session expired.');
		}
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $data)
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

                $existenceEmail = DB::table('user')
                ->select('id','email','password')
                ->where('id','!=',$idSession)
                ->where('status','!=',0)
                ->get();

                $currentPassword = DB::table('user')
                ->select('id','password')
                ->where('id','=',$idSession)
                ->get();

                foreach($existenceEmail as $email)
                {
                    if($email->email == $data->input('txtEmailUserEdit'))
                    {
                        DB::rollback();
                        return redirect ('admin/updateusers')->with('warning','Duplicate email. The email of the user is already registered.');
                    }
                }

                foreach($currentPassword as $password)
                {
                    if($password->password != md5($data->input('txtPasswordUserEdit')))
                    {
                        DB::rollback();
                        return redirect ('admin/updateusers')->with('warning','Incorrect current password.');
                    }
                }

                if(DB::table('user')
                    ->where('id', '=', $idSession)
                    ->update([
                        'name' => $data->input('txtNameUserEdit'),
                        'email' => $data->input('txtEmailUserEdit'),
                        'phone' => $data->input('txtPhoneUserEdit'),
                        'password' => md5($data->input('txtNewPasswordUserEdit')),
                        'updated_at' => Carbon::now(),
                    ])
                ){

                    DB::commit(); 
                    return redirect ('admin/updateusers')->with('message','Successful user update.');
                }else{
                    DB::rollback();
                    return redirect('admin/updateusers')->with('warning','Error when trying to update the user. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/updateusers')->with('warning','Error when trying to update the user. Please try again.');
            }
        } else{
            return redirect('/')->with('warning','Session expired.');;
		}
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
    public function delete($userId)
    {
        //
        if (session()->has('s_identificador') ) 
		{
            try
            {
                DB::beginTransaction();

                $existenceLoan = DB::table('user')
                ->select('user.id',
                        DB::raw('IF(EXISTS(SELECT 1 FROM loans WHERE user_id = user.id AND loans.status=1), "1", "0") AS used'),
                )
                ->where('user.id','=',$userId)
                ->where('user.status','!=',0)
                ->get();

                foreach($existenceLoan as $loan)
                {
                    if($loan->used == 1)
                    {
                        DB::rollback();
                        return redirect ('admin/updateusers')->with('warning','This user has outstanding loans. Please return the books to delete the account.');
                    }
                }
                
                if(DB::table('user')
                ->where('id', '=', $userId)
                ->update([
                    'status' => 0,
                    'updated_at' => Carbon::now()
                ])){
                    
                    DB::commit();
                    
                    Session()->flush();
                    return redirect('/')->with('message','Closed session. Successful user delete.');
                }else{
                    DB::rollback();
                    return redirect('admin/updateusers')->with('warning','Error when trying to delete the user account. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/updateusers')->with('warning','Error when trying to delete the user account. Please try again.');
            }
        } else{
            return redirect('/')->with('warning','Session expired.');;
		}
    }
}
