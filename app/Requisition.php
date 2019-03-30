<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model {
	public function category() {
		return $this->belongsTo(Category::class);
	}
}
