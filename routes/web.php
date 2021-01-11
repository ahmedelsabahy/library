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
route::get('/bookes/show/{book}', 'BookController@show')->name('books.show');
// creat bkkokes
route::get('bookes/create','BookController@create')->name('books.create');
route::post('bookes/store','BookController@store')->name('books.store');
//update
route::get('bookes/edit/{book}','BookController@edit')->name('books.edit');
Route::post('bookes/update/{book}','BookController@update')->name('books.update');
// delete
Route::get('bookes/delete/{book}','BookController@delete')->name('books.delete');


//categoris
Route::get('/categories', 'CategoryController@index')->name('categories.index');  
route::get('/categories/show/{category}', 'CategoryController@show')->name('categories.show');
// creat bkkokes
route::get('categories/create','CategoryController@create')->name('categories.create');
route::post('categories/store','CategoryController@store')->name('categories.store');
//update
route::get('categories/edit/{category}','CategoryController@edit')->name('categories.edit');
Route::post('categories/update/{category}','CategoryController@update')->name('categories.update');
// delete
Route::get('categories/delete/{category}','CategoryController@delete')->name('categories.delete');
