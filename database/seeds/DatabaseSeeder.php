<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		for ($i = 0; $i < 5; $i++) {
			Category::insert([
				'name' => $fake->word,
			]);
		}
		$rcate = Category::pluck('id');
		for ($i = 0; $i < 5; $i++) {
			Item::insert([
				// 'category_id' => Category::all()->random()->id,
				'category_id' => $fake->randomElement($rcate),
				'name' => $fake->word,
				'price' => ($fake->numberBetween($min = 3, $max = 99) * 1000),
				'stock' => $fake->numberBetween($min = 1, $max = 99),
			]);
		}
		for ($i = 0; $i < 5; $i++) {
			Users::insert([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt(111111),
			]);
		}
	}
}
