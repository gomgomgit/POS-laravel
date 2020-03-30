<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Orders;
use App\Models\Users;
use Illuminate\Http\Request;

class OrdersController extends Controller {
	public function index() {
		$data['owd'] = Orders::all();
		return view('orders.index', $data);
	}
	public function add() {
		$name['usr'] = Users::all();
		$cwi['cwis'] = Category::all();
		return view('orders.add', $name, $cwi);
	}
	public function store(Request $req) {
		$this->validate($req, [
			'user' => 'required',
			'table' => 'required',
		]);

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

		return redirect('orders');
	}
	public function details($id) {
		$data['odr'] = Orders::find($id);

		return view('orders.details', $data);
	}
	public function delete($id) {
		Orders::find($id)->delete();
		OrderDetail::where('order_id', $id)->delete();
		return redirect('orders')->with('delete', 'Order has been deleted');
	}
}
