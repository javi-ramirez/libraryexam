<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\LiteraryGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookController extends Controller
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

            $dataBooks = Book::select(
                'books.id',
                'books.name',
                'author',
                DB::raw('DATE_FORMAT(published_date, "%M, %Y") as published_date'),
                'books.created_at',
                'books.updated_at',
                DB::raw('GROUP_CONCAT(categories.name) AS categories'),
                DB::raw('IF(EXISTS(SELECT 1 FROM loans WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), "Not available", "Available") AS status'),
                DB::raw('(SELECT IF(EXISTS(SELECT 1 FROM loans WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), (SELECT name FROM user INNER JOIN loans ON user.id = loans.user_id WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), "")) AS user')
            )
            ->join('literary_genres', 'books.id', '=', 'literary_genres.book_id')
            ->join('categories', 'literary_genres.category_id', '=', 'categories.id')
            ->where('books.status','!=',0)
            ->groupBy('books.id', 'books.name', 'author', 'published_date', 'books.created_at', 'books.updated_at')
            ->paginate(5);     

            $dataCategories = Category::select(
                'id',
                'name',
                'description'
            )
            ->get();

            return view ('admin/books',['dataUser'=>$dataUser,'dataBooks'=>$dataBooks,'dataCategories'=>$dataCategories]);	
        } else{
            return redirect('/')->with('warning','Session expired.');
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

                $existenceName = DB::table('books')
                ->select('id','name')
                ->get();

                foreach($existenceName as $names)
                {
                    if($names->name == $data->input('txtName'))
                    {
                        DB::rollback();
                        return redirect ('admin/books')->with('warning','Duplicate name. The name of the book is already registered.');
                    }
                }

                $Books = new Book;
                $Books->name = $data->input('txtName');
                $Books->author = $data->input('txtAuthor');
                $Books->published_date = $data->input('txtPublishedDate');
                $Books->status = 1;
                $Books->created_at = Carbon::now();
                $Books->updated_at = Carbon::now();
                
                if($Books->save()){

                    $idBookNew = $Books->id;
            
                    $listCategoriesSelected = $data->input('txtCategory');
                    $listCategoriesSelected = explode(",", $listCategoriesSelected);        

                    foreach ($listCategoriesSelected as $category) {
                        $LiterayGenre = new LiteraryGenre();
                        $LiterayGenre->book_id = $idBookNew;
                        $LiterayGenre->category_id = $category; 
                        $LiterayGenre->save();
                    }
                    
                    DB::commit(); 
                    return redirect ('admin/books')->with('message','Successful book registration.');
                }else{
                    DB::rollback();
                    return redirect('admin/books')->with('warning','Error when trying to add the book. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/books')->with('warning','Error when trying to add the book. Please try again.');
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
                ->select('id','name','email')
                ->where('id', '=', $idSession)
                ->get();

                $idBook = $data->input('idBookShow');
                
                $dataBook = Book::select(
                    'books.id',
                    'books.name',
                    'books.author',
                    'books.published_date',
                    'books.created_at',
                    'books.updated_at'
                )
                ->where('books.id', '=', $idBook)
                ->get();


                $dataCategories = Category::select(
                    'categories.id'
                )
                ->join('literary_genres', 'literary_genres.category_id', '=', 'categories.id')
                ->join('books', 'books.id', '=', 'literary_genres.book_id')
                ->where('books.id', '=', $idBook)
                ->get();

                /*$arrayData = json_decode($dataCategories, true);

                $idValues = array_map(function($item) {
                    return $item['id'];
                }, $arrayData);

                $listCategory = implode(',', $idValues);*/
                
                return view ('admin/updatebook',['dataUser'=>$dataUser,'dataBook'=>$dataBook,'dataCategories'=>$dataCategories]);	
            }catch (\Exception $e) {
                return redirect('admin/books')->with('warning','Error loading book information. Please try again.');
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

                $existenceName = DB::table('books')
                ->select('id','name')
                ->get();

                foreach($existenceName as $names)
                {
                    if($names->name == $data->input('txtNameEdit'))
                    {
                        DB::rollback();
                        return redirect ('admin/books')->with('warning','Duplicate name. The name of the book is already registered.');
                    }
                }

                $idBook = intval($data->input('idBookEdit'));
                $Books = Book::find($idBook);

                $Books->name = $data->input('txtNameEdit');
                $Books->author = $data->input('txtAuthorEdit');
                $Books->published_date = $data->input('txtPublishedDateEdit');
                $Books->updated_at = Carbon::now();
                
                if($Books->save()){

                    DB::delete('DELETE FROM literary_genres WHERE literary_genres.book_id =?',[$idBook]);
            
                    $listCategoriesSelected = $data->input('txtCategoryEdit');
                    $listCategoriesSelected = explode(",", $listCategoriesSelected);        

                    foreach ($listCategoriesSelected as $category) {
                        $LiterayGenre = new LiteraryGenre();
                        $LiterayGenre->book_id = $idBook;
                        $LiterayGenre->category_id = $category; 
                        $LiterayGenre->save();
                    }
                    
                    DB::commit(); 
                    return redirect ('admin/books')->with('message','Successful book update.');
                }else{
                    DB::rollback();
                    return redirect('admin/books')->with('warning','Error when trying to update the book. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/books')->with('warning','Error when trying to update the book. Please try again.');
            }
        } else{
            return redirect('/')->with('warning','Session expired.');;
		}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($idBook)
    {
        //
        if (session()->has('s_identificador') ) 
		{
            try
            {
                DB::beginTransaction();

                $Books = Book::find($idBook);

                $isLoan = DB::table('books')
                ->select('id','name')
                ->get();

                $isLoan = Book::select(
                    DB::raw('IF(EXISTS(SELECT 1 FROM loans WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), "1", "0") AS status'),
                )
                ->join('literary_genres', 'books.id', '=', 'literary_genres.book_id')
                ->join('categories', 'literary_genres.category_id', '=', 'categories.id')
                ->where('books.status','!=',0)
                ->groupBy('books.id', 'books.name', 'author', 'published_date', 'books.created_at', 'books.updated_at')
                ->get();    

                foreach($isLoan as $loan)
                {
                    if($loan->status == 1)
                    {
                        DB::rollback();
                        return redirect ('admin/books')->with('warning','The book is on loan, it must be returned in order to be removed.');
                    }
                }

                $Books->status = 0;
                $Books->updated_at = Carbon::now();
                
                if($Books->save()){
                    
                    DB::commit(); 
                    return redirect ('admin/books')->with('message','Successful book delete.');
                }else{
                    DB::rollback();
                    return redirect('admin/books')->with('warning','Error when trying to delete the book. Please try again.');
                } 
            }catch (\Exception $e) {
                return redirect('admin/books')->with('warning','Error when trying to delete the book. Please try again.');
            }
        } else{
            return redirect('/')->with('warning','Session expired.');;
		}
    }
}
