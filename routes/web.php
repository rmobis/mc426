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

Route::get('/', function () {
	$categories = Category::all();

	return view('requisition-form', ['categories' => $categories]);
});

Route::post('/', function () {
	$req = new Requisition();

	$req->topic = request('topic');
	$req->category_id = request('category');
	$req->description = request('description');

	$req->save();

	return redirect('/list');
});

Route::get('/list', function () {
	$requisitions = Requisition::with('category')->get();

	return view('requisition-list', ['requisitions' => $requisitions]);
});

Route::get('/search/{text}', function($text) {
	$result = Requisition::where("description", "LIKE", "%$text%")->get();
	return view('requisition-list', ['requisitions' => $result]);
});
