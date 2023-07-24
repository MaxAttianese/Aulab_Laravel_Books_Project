<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

use App\Http\Controllers\HomepageController;

use App\Http\Controllers\ComixController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class,"homepage"])->name("homepage");

Route::get("books", [BookController::class,"index"])->name("books.index");



Route::get("books/{book}", [BookController::class,"show"])->name("books.show");



Route::get("/comix", [ComixController::class, "index"])->name("comix.index");

Route::get("/comix/{id}", [ComixController::class, "show"])->name("comix.show");





Route::prefix("editor")->middleware("auth")->group(function() {

    Route::resource("books", BookController::class)->except("index", "show");

    Route::get("books/account", [BookController::class, "booksAccount"])->name("books.account");

});