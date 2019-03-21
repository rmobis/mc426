<?php

use \App\Requisition;

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
	return view('requisition-form');
});

Route::post('/', function () {
	$req = new Requisition();

	$req->topic = request('topic');
	$req->category = request('category');
	$req->description = request('description');

	$req->save();

	return redirect('/');
});
