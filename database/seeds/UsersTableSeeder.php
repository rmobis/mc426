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
			'password' => bcrypt('oibidu'),
			'is_admin' => true
		]);

		factory(App\User::class, 1)->create([
			'email' => 'dsfugimoto@gmail.com',
			'password' => bcrypt('daviddavid'),
			'is_admin' => false
		]);

		factory(App\User::class, 1)->create([
			'email' => 'fbidu@gmail.com',
			'password' => bcrypt('oibidu'),
			'is_admin' => false
		]);

		factory(App\User::class, 5)->create();
	}
}
