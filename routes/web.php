<?php

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

Route::groupe(['prefix' => 'admin'], function(){
    Route::get('news/create', 'Admin\NewsController@add');
});

// 問題３
Route::get('XXX', 'AAAController@bbb');

// 問題４
Route::groupe(['prefix' => 'admin'], function(){
    Route::get('profile/create', 'ProfileController@create');
    Route::get('profile/edit', 'ProfileController@edit');
});