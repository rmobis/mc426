<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Requisition;
use App\Http\Controllers\Controller;

class RequisitionController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

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
		$user = auth()->user();
		$text = request('q');
		$status = request('status');
		$category = request('category');

		$reqs = Requisition::with('category')
			->when(!$user->is_admin, function ($qry) use ($user) {
				return $qry->where('user_id', $user->id);
			})
			->when($user->is_admin, function ($qry) use ($user) {
				return $qry->withTrashed();
			})
			->when($text, function ($qry, $text) {
				return $qry->where("description", "LIKE", "%$text%")
					->orWhere("topic", "LIKE", "%$text%");
			})
			->when($status, function ($qry, $status) {
				return $qry->where('status', $status);
			})
			->when($category, function ($qry, $category) {
				return $qry->where('category_id', $category);
			})
			->paginate(10);

		$categories = Category::all();

		return view('requisition-list', [
			'categories' => $categories,
			'requisitions' => $reqs,
			'text' => $text,
			'status' => $status,
			'category' => $category
		]);
	}

	public function postSearch() {
		$search = request('search');
		$status = request('status');
		$category = request('category');

		return redirect('list?q=' . $search . '&status=' . $status . '&category=' . $category);
	}

	public function show($id) {
		$requisition = Requisition::with('category')->findOrFail($id);

		return view('requisition-detail', ['requisition' => $requisition]);
	}

	public function close($id) {
		$requisition = Requisition::with('category')->find($id);
		$requisition->status = 'closed';
		$requisition->closing_reason = request('reason');
		$requisition->save();

		return $this->show($id);
	}

	public function edit($id) {
		$categories = Category::all();
		$requisition = Requisition::with('category')->findOrFail($id);

		return view('requisition-edit', ['categories' => $categories, 'requisition' => $requisition]);
	}

	public function editRequisition($id) {
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

	public function open($id) {
		$requisition = Requisition::with('category')->find($id);
		$requisition->status = 'open';
		$requisition->save();

		return view('requisition-detail', ['requisition' => $requisition]);
	}
}
