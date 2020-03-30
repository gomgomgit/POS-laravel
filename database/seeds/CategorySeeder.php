<?php

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(Faker $fake) {
		for ($i = 0; $i < 5; $i++) {
			Category::insert([
				'name' => $fake->word,
			]);
		}
	}
}
