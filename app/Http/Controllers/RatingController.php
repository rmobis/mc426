<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$ratings = Rating::all();
		return $ratings;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rating = new Rating();

		$rating->rate = request('rate');
		$rating->description = request('description');
		$rating->requisition_id = request('requisition_id');
		$rating->save();

		return redirect('/ratings');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\rating  $rating
	 * @return \Illuminate\Http\Response
	 */
	public function show(rating $rating) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\rating  $rating
	 * @return \Illuminate\Http\Response
	 */
	public function edit(rating $rating) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\rating  $rating
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, rating $rating) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\rating  $rating
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(rating $rating) {
		//
	}
}
