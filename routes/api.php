<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::middleware('ISApiuser')->group(function(){

Route::post('bookes/store ' , 'ApiBookController@store');
Route::post('bookes/update/{book}' , 'ApiBookController@update');
Route::get('bookes/delete/{book}' , 'ApiBookController@delete');

});
Route::get('bookes' , 'ApiBookController@index');
Route::get('/bookes/show/{book}' , 'ApiBookController@show');

Route::post('handelregister','ApiAuthController@handelregister');
Route::post('handellogin','ApiAuthController@handellogin');
Route::post('logout','ApiAuthController@logout');




