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
Route::get('/sale', 'SaleController@index');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/setting','UserController@index');
    Route::patch('/setting','UserController@update');
});


Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    //TODO 1: more common solution for tabs
    Route::get('/', "AdminController@index");
    Route::get('/user', "AdminController@user_administration");
    Route::get('/blacklist', "AdminController@blacklist_administration");
    Route::get('/statistic', "AdminController@statistic");

    //TODO 2: seperate model controller out
    Route::get('/model/{model}', "AdminController@model");
    Route::get('/create/{model}', "AdminController@model_display");
    Route::get('/editor/{model}/{id}', "AdminController@model_display");
    Route::post('/editor/{model}', "AdminController@model_edit");
    Route::get('/delete/{model}/{id}', "AdminController@model_delete_confirmation");
    Route::post('/delete/{model}/{id}', "AdminController@model_delete");
});

Route::auth();
