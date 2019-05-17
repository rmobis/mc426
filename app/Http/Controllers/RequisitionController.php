<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Requisition;
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
		$req = new Requisition();
		$result = $req->searchLike($text)->get();

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

	public function close($id) {
		$requisition = Requisition::with('category')->find($id);
		$requisition->status = 'closed';
		$requisition->save();

		return $this->show($id);
	}

	public function edit($id) {
		$requisition = Requisition::with('category')->find($id);

		$requisition->topic = request('topic');
		$requisition->category_id = request('category');
		$requisition->description = request('description');

		$requisition->save();

		return $this->show($id);
	}

	public function delete($id) {
		$requisition = Requisition::with('category')->find($id);
		$requisition->status = 'deleted';
		$requisition->save();

		return redirect('list');
	}
}
