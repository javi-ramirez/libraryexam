<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'published_date',
                'books.created_at',
                'books.updated_at',
                DB::raw('GROUP_CONCAT(categories.name) AS categories'),
                DB::raw('IF(EXISTS(SELECT 1 FROM loans WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), "Not available", "Available") AS status'),
                DB::raw('(SELECT IF(EXISTS(SELECT 1 FROM loans WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), (SELECT name FROM user INNER JOIN loans ON user.id = loans.user_id WHERE book_id = books.id AND return_date IS NULL AND loans.status=1), "")) AS user')
            )
            ->join('literary_genres', 'books.id', '=', 'literary_genres.book_id')
            ->join('categories', 'literary_genres.category_id', '=', 'categories.id')
            ->groupBy('books.id', 'books.name', 'author', 'published_date', 'books.created_at', 'books.updated_at')
            ->paginate(5);     

            return view ('admin/books',['dataUser'=>$dataUser,'dataBooks'=>$dataBooks]);	
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
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
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
    public function destroy(Book $book)
    {
        //
    }
}
