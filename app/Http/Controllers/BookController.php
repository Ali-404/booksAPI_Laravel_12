<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\RepositoryInterface;
use App\Http\Repositories\BookRepository;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class BookController extends Controller
{


    protected BookRepository $_bookReposotory;

    function __construct(BookRepository $repository){
        $this->_bookReposotory = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->_bookReposotory->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {


        $request["writer"] = Auth::user()->id;
        $newBook = $this->_bookReposotory->create($request->all());

        if ($request->hasFile("cover")){
            $request["cover"] = $request->file("cover")->storeAs("/uploads/covers", $newBook->id );

            $newBook->cover = $request["cover"];
            $newBook->save();
        }



        return response()->json([
            "message" => "New Book created Successfully ",
            "book" => $newBook
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
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
