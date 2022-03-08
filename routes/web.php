<?php

use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('master.index');
});

// route book
Route::get('books', [BookController::class, 'tambah'])->name('create-book');
Route::post('books', [BookController::class, 'store'])->name('store-book');
Route::get('books/table', [BookController::class, 'tampilan'])->name('index-book');
Route::get('books/table/{id}', [BookController::class, 'edit'])->name('edit-book');
Route::put('books/table/{id}', [BookController::class, 'update'])->name('update-book');
Route::delete('books/table/{id}', [BookController::class, 'delete'])->name('delete-book');

// rote member
