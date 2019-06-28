<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(App\User::class, 1)->create([
			'email' => 'r.mobis@gmail.com',
			'password' => bcrypt('oibidu')
		]);

		factory(App\User::class, 5)->create();
	}
}
