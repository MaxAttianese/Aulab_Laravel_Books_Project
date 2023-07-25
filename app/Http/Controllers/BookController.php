<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        
        return view("Books.index", compact("books"));
    }

    public function booksAccount() {

        $books = auth()->user()->books;

        return view("Books.accountBooks", compact("books"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detailsBook = new Book();

        $titleForm = "Aggiungi libro";

        $action = route("books.store") ;

        $buttoName = "Aggiungi";

        return view("Books.form", compact("detailsBook", "titleForm", "action", "buttoName"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $data = array_merge($request->all(), ["user_id" => auth()->user()->id]);

        $book = Book::create($data);

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
        
        return view("Books.show", compact("detailsBook"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $detailsBook = $book;

        $titleForm = "Modifica libro";

        $action = route("books.update", $detailsBook);

        $buttoName = "Modifica";

        return view("Books.form", compact("detailsBook", "titleForm", "action", "buttoName"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, Book $book)
    {
        if($book->user->id != auth()->user()->id) {

            abort(403);
        }
        
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
        if($book->user->id != auth()->user()->id) {

            abort(403);
        }

        $book->delete();

        return redirect()->route("books.index")->with(["success" => "Libro eliminato con successo"]);
    }
}
