<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Orders;
use App\Models\Users;

class DashboardController extends Controller {
	public function index() {
		if (empty(session('email'))) {
			return view('welcome');
		} else {
			$data['item'] = Item::count();
			$data['user'] = Users::count();
			$data['order'] = Orders::count();

			return view('dashboard', $data);
		}

	}
}
