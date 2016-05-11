<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', "SearchController@index");
Route::get('/search/{key?}', 'SearchController@show');

Route::get('/donator', "Admin\DonatorController@index");
Route::get('/home', 'HomeController@index');

Route::resource('/user', 'UserController', ['only' => ['index', 'show']]);


Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', function () {
        return "This is admin page";
    });
    Route::resource('liar', 'LiarController');
    Route::resource('donator', 'DonatorController');
});

Route::auth();
