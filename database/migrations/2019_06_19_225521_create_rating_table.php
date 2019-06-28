<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('rating', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('requisition_id');
			$table->unsignedBigInteger('user_id');
			$table->decimal('rate');
			$table->text('description');
			$table->timestamps();

			$table->foreign('requisition_id')
				->references('id')
				->on('requisitions');
			$table->foreign('user_id')
				->references('id')
				->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('rating');
	}
}
