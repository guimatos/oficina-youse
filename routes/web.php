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
Route::post('/', 'PartsInvoicesController@store')->name('storeInvoice');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'notas'], function () {
        /* Search for notes */
        Route::get ('/pesquisar', 'PartsInvoicesController@search')->name('search');
        Route::get('/', 'PartsInvoicesController@get');
        Route::get('/{id}', 'PartsInvoicesController@show');
        Route::post('/deletar/{id}', 'PartsInvoicesController@destroy');
    });
});

Auth::routes();
