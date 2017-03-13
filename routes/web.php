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

Route::get('/home', 'HomeController@index');

Route::get('/home/billboardform', 'BillboardController@billboardform');

Route::post('/home/createbillboard', 'BillboardController@createbillboard');

Route::get('/home/upload/all', 'BillboardController@getAll');

Route::get('/home/upload/{id}/edit', 'BillboardController@edit');

Route::get('/home/upload/deletepic', 'BillboardController@removePic');

Route::put('/home/upload/{id}', 'BillboardController@update');

Route::get('/billboard/example', 'PresentationController@examplebillboard');
