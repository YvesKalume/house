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

Route::namespace('House')->group(function () {
    // Controllers Within The "App\Http\Controllers\House" Namespace

    Route::get('/','HouseController@index')->name('home.index');
    Route::get('/user/houses','HouseController@mine')->name('house.list');
    Route::get('/house/add','HouseController@create')->name('house.create');
    Route::post('/house/add','HouseController@store')->name('house.store');
    Route::get('house/{house}','HouseController@show')->name('house.preview');
    Route::get('/house/{house}/edit','HouseController@edit')->name('house.edit');
    Route::post('/house/{house}/edit','HouseController@update')->name('house.update');
    Route::get('/house/{house}/delete','HouseController@destroy')->name('house.delete');
    Route::get('/search','HouseController@search')->name('house.search');
    Route::post('/search','HouseController@search')->name('house.search');
    Route::get('/map','HouseController@map');


});


Route::group(['namespace'=>'Auth'],function (){
    Route::get('/register','RegisterController@index')->name('register.index');
    Route::post('/register','RegisterController@register')->name('user.register');
    Route::get('/login','LoginController@index')->name('login.index');
    Route::post('/login','LoginController@login')->name('user.login');
});


