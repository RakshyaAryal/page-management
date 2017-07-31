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

Route::group(['middleware' => 'auth'], function () {


    Route::post('admin/page/store','Admin\PageController@store');
    Route::get('admin/page','Admin\PageController@index');
    Route::get('admin/page/create','Admin\PageController@create');
    Route::get('admin/page/{id}/edit','Admin\PageController@edit');
    Route::post('admin/page/{id}/update','Admin\PageController@update');
    Route::get('admin/page/{id}/view','Admin\PageController@view');
    Route::get('admin/page/{id}/delete','Admin\PageController@delete');
    Route::post('admin/page/store/{id}','Admin\PageController@update');



Route::get('/home', 'HomeController@index')->name('home');

});