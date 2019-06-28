<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model {
	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function rating() {
		return $this->hasOne(Rating::class);
	}

	public function searchLike($text) {
		return $this->where("description", "LIKE", "%$text%")
		->orWhere("topic", "LIKE", "%$text%");
	}
}
