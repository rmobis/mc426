<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {
	public function requisition() {
		return $this->belongsTo(Requisition::class);
	}
}
