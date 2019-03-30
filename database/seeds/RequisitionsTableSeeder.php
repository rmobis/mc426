<?php

use Illuminate\Database\Seeder;

class RequisitionsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(App\Requisition::class, 55)->create();
	}
}
