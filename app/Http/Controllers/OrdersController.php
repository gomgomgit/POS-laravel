<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\OrderDetail;
use App\Models\Orders;
use App\Models\PaymentMethod;
use App\Models\Users;
use Illuminate\Http\Request;

class OrdersController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		if (Request('role') == 1) {
			$data['owd'] = Orders::all();
		} else {
			$data['owd'] = Orders::where('user_id', Request('id'));
		}
		return view('orders.index', $data);
	}
	public function add() {
		$data['usr'] = Users::all();
		$data['cwis'] = Category::all();
		// $data['item'] = Item::all()->sortBy('name');
		$data['item'] = Item::all()->sortBy('name');
		$data['payment'] = PaymentMethod::all()->sortBy('name');

		return view('orders.add', $data);

		// return response()->json([
		// 	'success' => true,
		// 	'message' => 'add order',
		// 	'data' => $data['item'],
		// ]);

		// return $data['item'];
	}
	public function store(Request $req) {
		// $this->validate($req, [
		// 	'user' => 'required',
		// 	'table' => 'required',
		// ]);

		var_dump($req->table);

		Orders::insert([
			'table_number' => $req->table,
			'user_id' => $req->user,
			'date' => date('Y-m-d'),
		]);

		$odr = Orders::max('id');

		$list = count($req->item);

		for ($i = 0; $i < $list; $i++) {
			OrderDetail::insert([
				'order_id' => $odr,
				'item_id' => $req->item[$i],
				'qty' => $req->qty[$i],
				'total' => $req->total[$i],
			]);
		}

		return redirect('orders')->with('message', 'Order has been added');
	}
	public function details($id) {
		$data['odr'] = Orders::find($id);

		return view('orders.details', $data);
	}
	public function delete($id) {
		Orders::find($id)->delete();
		OrderDetail::where('order_id', $id)->delete();
		return redirect('orders')->with('message', 'Order has been deleted');
	}
}
