<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRequisitionOnwership extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('requisitions', function (Blueprint $table) {
			// We make it nullable only so we don't get any 'cannot add a NOT NULL column with default value NULL'
			// warnings when running the migrations; we'll make it not nullable again later down
			$table->unsignedBigInteger('user_id')
				->nullable();

			// Apparently SQLite doesn't support dropping foreign keys so, to avoid problems, we'll just skip it
			if (config('database.default') != 'sqlite') {
				$table->foreign('user_id')
					->references('id')
					->on('users');
			}
		});

		Schema::table('requisitions', function (Blueprint $table) {
			$table->unsignedBigInteger('user_id')
				->nullable(false)
				->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		// Apparently SQLite doesn't support dropping foreign keys
		if (config('database.default') != 'sqlite') {
			Schema::table('requisitions', function (Blueprint $table) {
				$table->dropForeign('requisitions_user_id_foreign');
			});
		}

		Schema::table('requisitions', function (Blueprint $table) {
			$table->dropColumn('user_id');
		});
	}
}
