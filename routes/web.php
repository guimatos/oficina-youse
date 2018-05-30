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

Route::get('/', 'PartsInvoicesController@index');
Route::post('/', 'PartsInvoicesController@store');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('notas', 'PartsInvoicesController@list');
    Route::get('notas/{id}', 'PartsInvoicesController@show');
    Route::post('notas/deletar/{id}', 'PartsInvoicesController@destroy');
});

Auth::routes();
