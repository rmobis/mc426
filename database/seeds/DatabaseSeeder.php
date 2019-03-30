<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();

		$this->call(CategoriesTableSeeder::class);
		$this->call(RequisitionsTableSeeder::class);

		Eloquent::reguard();
	}
}
