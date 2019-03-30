<?php

use App\Requisition;
use App\Category;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryRelationshipToRequisitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('requisitions', function (Blueprint $table) {
			// We make it nullable only so we don't get any 'cannot add a NOT NULL column with default value NULL'
			// warnings when running the migrations; we'll make it not nullable again later down
			$table->unsignedBigInteger('category_id')
				->nullable();

			// Apparently SQLite doesn't support dropping foreign keys so, to avoid problems, we'll just skip it
			if (config('database.default') != 'sqlite') {
				$table->foreign('category_id')
					->references('id')
					->on('categories');
			}
		});

		Schema::table('requisitions', function (Blueprint $table) {
			$table->unsignedBigInteger('category_id')
				->nullable(false)
				->change();
		});

		Schema::table('requisitions', function (Blueprint $table) {
			$table->dropColumn('category');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('requisitions', function (Blueprint $table) {
			// We make it nullable only so we don't get any 'cannot add a NOT NULL column with default value NULL'
			// warnings when running the migrations; we'll make it not nullable again later down
			$table->string('category')
				->nullable();
		});

		Schema::table('requisitions', function (Blueprint $table) {
			$table->string('category')
				->nullable(false)
				->change();
		});

		// Apparently SQLite doesn't support dropping foreign keys
		if (config('database.default') != 'sqlite') {
			Schema::table('requisitions', function (Blueprint $table) {
				$table->dropForeign('requisitions_category_id_foreign');
			});
		}

		Schema::table('requisitions', function (Blueprint $table) {
			$table->dropColumn('category_id');
		});
	}
}
