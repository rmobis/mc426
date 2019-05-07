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

Route::post('/list', function (Request $request) {
	$search = request('search');
	return $search ? redirect('list?q='.$search) : redirect('list');
});

Route::get('/list', function (Request $request) {
	$text = request('q');
	$result = Requisition::where("description", "LIKE", "%$text%")->orWhere("topic", "LIKE", "%$text%")->get();
	return view('requisition-list', ['requisitions' => $result, 'text' => $text]);
});

Route::get('/list/{id}', function ($id) {
	$requisition = Requisition::with('category')->findOrFail($id);

	return view('requisition-detail', ['requisition' => $requisition]);
});
