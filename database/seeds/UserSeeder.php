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
		;

		for ($i = 0; $i < 5; $i++) {
			Users::insert([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt($faker->word),
			]);
		}
	}
}
