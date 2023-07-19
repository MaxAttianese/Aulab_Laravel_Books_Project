<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

use App\Http\Requests\bookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        
        return view("Homepage.Books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detailsBook = "";

        return view("Homepage.Books.create", compact("detailsBook"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(bookRequest $request)
    {
        $book = Book::create($request->all());

        if($request->hasFile("image") && $request->file("image")->isValid()){

            $extension = $request->file("image")->extension();

            $randomName = uniqid("cover_book_ ") . "$extension";

            $coverPath = $request->file("image")->storeAs("public/cover" . $book->id, $randomName);

            $book->image = $coverPath;

            $book->save();
        }

        return redirect()->route("books.index")->with(["success" => "Libro aggiunto con successo."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        $detailsBook = Book::find($book->id);
        
        return view("Homepage.Books.show", compact("detailsBook"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $detailsBook = $book;

        return view("Homepage.Books.edit", compact("detailsBook"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(bookRequest $request, Book $book)
    {
        $book->title = $request->title;
        $book->publicated = $request->publicated;
        $book->gender = $request->gender;
        $book->theme = $request->theme;
        $book->save();

        if($request->hasFile("image") && $request->file("image")->isValid()){

            $extension = $request->file("image")->extension();

            $randomName = uniqid("cover_book_ ") . "$extension";

            $coverPath = $request->file("image")->storeAs("public/cover" . $book->id, $randomName);

            $book->image = $coverPath;

            $book->save();
        }

        return redirect()->route("books.show", $book)->with(["success" => "Informazioni libro modificate con successo"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route("books.index")->with(["success" => "Libro eliminato con successo"]);
    }
}
