<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisition extends Model {
	use SoftDeletes;

	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function rating() {
		return $this->hasOne(Rating::class);
	}

	public function searchLike($text) {
		return $this->where("description", "LIKE", "%$text%")
		->orWhere("topic", "LIKE", "%$text%");
	}
}
