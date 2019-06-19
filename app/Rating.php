<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {
	public function requisitions() {
		return $this->hasOne(Requisition::class);
	}
}
