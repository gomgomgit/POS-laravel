<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller {
	public function index() {
		$data['item'] = Item::all();
		return view('item.index', $data);
	}
	public function add() {
		$cate['category'] = Category::all();
		return view('item.add', $cate);
	}
	public function store(Request $req) {
		$this->validate($req, [
			'category' => 'required',
			'name' => 'required',
			'price' => 'required',
			'stock' => 'required',
		]);

		Item::insert([
			'category_id' => $req->category,
			'name' => $req->name,
			'price' => $req->price,
			'stock' => $req->stock,
		]);

		return redirect('item')->with('message', 'Item has been added');
	}
	public function edit($id) {
		$cate['category'] = Category::all();
		$item['item'] = Item::find($id);
		return view('item.edit', $cate, $item);
	}
	public function update($id, Request $req) {
		$this->validate($req, [
			'category' => 'required',
			'name' => 'required',
			'price' => 'required',
			'stock' => 'required',
		]);

		$update = Item::find($id);
		$update->category_id = $req->category;
		$update->name = $req->name;
		$update->price = $req->price;
		$update->stock = $req->stock;
		$update->save();

		return redirect('item')->with('message', 'Item has been updated');
	}
	public function delete($id) {
		Item::find($id)->delete();
		return redirect('item')->with('message', 'Item has been deleted');
	}
}
