<?php

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		PaymentMethod::insert([
			'name' => 'Cash',
		]);
		PaymentMethod::insert([
			'name' => 'Transfer',
		]);
	}
}
