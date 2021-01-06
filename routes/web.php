<?php

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
    return view('welcome');
});
// read bookes
Route::get('/bookes', 'BookController@index')->name('books.index'); // bookes  عشان ارن  (url) دا اللي بكتبه في localhost/library/public/bookes
route::get('/bookes/show/{id}', 'BookController@show')->name('books.show');
// creat bkkokes
route::get('bookes/create','BookController@create')->name('books.create');
route::post('bookes/store','BookController@store')->name('books.store');
//update
route::get('bookes/edit/{id}','BookController@edit')->name('books.edit');
Route::post('bookes/update/{id}','BookController@update')->name('books.update');
// delete
Route::get('bookes/delete/{id}','BookController@delete')->name('books.delete');