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

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function(){

Route::resource('/', 'AdminController');

});

Route::get('/admin/create', 'AdminController@create');
Route::post('/admin', 'AdminController@store');
Route::get('/admin/{id}/edit', 'AdminController@edit');
Route::patch('admin/{id}', 'AdminController@update');
Route::delete('admin/{id}', 'AdminController@destroy');