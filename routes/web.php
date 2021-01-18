<?php

use App\Http\Middleware\isloginadmin;
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
Route::middleware('Islogin')->group(function(){
    // creat bkkokes
route::get('bookes/create','BookController@create')->name('books.create');
route::post('bookes/store','BookController@store')->name('books.store');
//update
route::get('bookes/edit/{book}','BookController@edit')->name('books.edit');
Route::post('bookes/update/{book}','BookController@update')->name('books.update');

// creat category
route::get('categories/create','CategoryController@create')->name('categories.create');
route::post('categories/store','CategoryController@store')->name('categories.store');
//update
route::get('categories/edit/{category}','CategoryController@edit')->name('categories.edit');
Route::post('categories/update/{category}','CategoryController@update')->name('categories.update');


});

Route::middleware('isloginadmin')->group(function(){
    // delete
Route::get('categories/delete/{category}','CategoryController@delete')->name('categories.delete');
// delete
Route::get('bookes/delete/{book}','BookController@delete')->name('books.delete');
});

// read bookes
Route::get('/bookes', 'BookController@index')->name('books.index'); // bookes  عشان ارن  (url) دا اللي بكتبه في localhost/library/public/bookes
route::get('/bookes/show/{book}', 'BookController@show')->name('books.show');

//read categoris
Route::get('/categories', 'CategoryController@index')->name('categories.index');  
route::get('/categories/show/{category}', 'CategoryController@show')->name('categories.show');

//auth register
Route::get('/register','AuthController@register')->name('auther.register');
Route::post('handelregister','AuthController@handelregister')->name('auther.handelregister');
//login
Route::get('/login','AuthController@login')->name('auther.login');
Route::post('handellogin','AuthController@handellogin')->name('auther.handelogin');
//logout
Route::get('/logout','AuthController@logout')->name('auther.logout');

Route::get('login/github', 'AuthController@redirectToProvider')->name('githup.redirect');
Route::get('login/github/callback', 'AuthController@handleProviderCallback')->name('githup.back');

