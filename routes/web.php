<?php

use Illuminate\Support\Facades\Route;
use App\Library;

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

    $library  = Library::all();

    return view('home', ['library' => $library]);
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::resource('/libraries', 'LibrariesController');
Route::get(
    '/libraries/{library}/destroy',
    'LibrariesController@destroy'
)->name('libraries.delete');

Route::resource('/books', 'BooksController');
Route::get(
    '/books/{book}/destroy',
    'BooksController@destroy'
)->name('books.delete');
