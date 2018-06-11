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
        Route::get('/excel', 'PartsInvoicesController@exportExcel');
        Route::get('/excel/{id}', 'PartsInvoicesController@exportExcel');
        Route::get('/', 'PartsInvoicesController@get')->name('partsinvoices');
        Route::get('/{id}', 'PartsInvoicesController@show');
        Route::get('/deletar/{id}', 'PartsInvoicesController@destroy');
        Route::get('/download/{id}', 'PartsInvoicesController@downloadInvoiceDocuments')->name('download');
    });
});

Auth::routes();
