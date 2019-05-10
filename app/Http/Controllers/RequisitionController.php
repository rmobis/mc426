<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class RequisitionController extends Controller {

	public function showForm() {
		$categories = Category::all();

		return view('requisition-form', ['categories' => $categories]);
	}

	public function newRequisition() {
		$req = new Requisition();

		$req->topic = request('topic');
		$req->category_id = request('category');
		$req->description = request('description');
		$req->status = 'open';

		$req->save();

		return redirect('/list');
	}

	public function search() {
		$text = request('q');
		$result = Requisition::searchLike($text)->get();

		return view('requisition-list', ['requisitions' => $result, 'text' => $text]);
	}

	public function postSearch() {
		$search = request('search');
		return $search ? redirect('list?q='.$search) : redirect('list');
	}

	public function show($id) {
		$requisition = Requisition::with('category')->findOrFail($id);

		return view('requisition-detail', ['requisition' => $requisition]);
	}

	public function delete($id) {
		$requisition = Requisition::with('category')->find($id);
		$requisition->status = 'deleted';
		$requisition->save();

		return redirect('list');
	}
}
