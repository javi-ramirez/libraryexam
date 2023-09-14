<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryController extends Controller
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

            $dataCategories = Category::select(
                'id',
                'name',
                'description',
                'created_at',
                'updated_at',
            )
            ->paginate(5);     

            return view ('admin/categories',['dataUser'=>$dataUser,'dataCategories'=>$dataCategories]);	
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

                $existenceName = DB::table('categories')
                ->select('id','name')
                ->get();

                foreach($existenceName as $names)
                {
                    if($names->name == $data->input('txtNameCategory'))
                    {
                        DB::rollback();
                        return redirect ('admin/categories')->with('warning','Duplicate name. The name of the book is already registered.');
                    }
                }

                $Category = new Category();
                $Category->name = $data->input('txtNameCategory');
                $Category->description = $data->input('txtDescriptionCategory');
                $Category->created_at = Carbon::now();
                $Category->updated_at = Carbon::now();
                
                if($Category->save()){

                    
                    DB::commit(); 
                    return redirect ('admin/categories')->with('message','Successful category registration.');
                }else{
                    DB::rollback();
                    return redirect('admin/categories')->with('warning','Error when trying to add the category. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/categories')->with('warning','Error when trying to add the category. Please try again.');
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
    public function show(Category $category)
    {
        //
        $dataCategories = Category::select(
            'id',
            'name',
            'description'
        )
        ->get();

        return response($dataCategories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
