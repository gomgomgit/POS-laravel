<?php

use App\Models\Category;
use App\Models\Item;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(Faker $fake) {
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
	}
}
