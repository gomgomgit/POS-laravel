<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;

class DashboardController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index(Request $request) {
		$data['item'] = Item::count();
		$data['user'] = Users::count();
		$data['order'] = Orders::count();

		return view('dashboard', $data);

	}
}
