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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/practices','PracticesController@index')->name('practices.index');

Route::get('/practice/{practice}','PracticesController@show')->name('practices.show');


Route::group(['middleware' => 'auth'],function(){

    Route::get('/new-practice','PracticesController@create')->name('practices.create');
    Route::post('/store-practice','PracticesController@store')->name('practices.store');
    Route::get('/edit-practice/{practice}','PracticesController@edit')->name('practices.edit');
    Route::post('/update-practice/{practice}','PracticesController@update')->name('practices.update');
    Route::delete('/practice/{practice}','PracticesController@delete')->name('practices.delete');

});

Route::get('/done-practice/{id}','PracticesController@done')->name('practices.done');
Route::get('/not-done-practice/{id}','PracticesController@not_done')->name('practices.not-done');
