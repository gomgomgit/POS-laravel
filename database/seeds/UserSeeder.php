<?php

use App\Models\Users;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(Faker $faker) {

		Users::insert([
			'name' => 'admin',
			'email' => 'admin@admin',
			'password' => bcrypt('admin'),
			'role' => 1,
		]);

		for ($i = 0; $i < 5; $i++) {
			Users::insert([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt(111111),
				'role' => rand(1, 2),
			]);
		}
	}
}
