<?php

use \App\Requisition;
use \App\Category;

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

Route::get('/', 'RequisitionController@showForm')->name('home');

Route::post('/', 'RequisitionController@newRequisition');

Route::post('/list', 'RequisitionController@postSearch');

Route::get('/list', 'RequisitionController@search');

Route::get('/list/{id}', 'RequisitionController@show');

Route::delete('/list/{id}', 'RequisitionController@delete');

Route::post('/list/{id}/close', 'RequisitionController@close');

Route::post('/list/{id}/edit', 'RequisitionController@editRequisition');

Route::get('/list/{id}/edit', 'RequisitionController@edit');

Auth::routes();
