<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ItemController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	// public function show_data(Request $request) {
	// 	if ($request->ajax()) {
	// 		$data = Item::all();

	// 		return DataTables::of($data)
	// 			->addColumn('action', function ($data) {
	// 				$button = '<a href="item/edit/' . $data->id . '" class="btn-sm btn-success">Edit</a> ';
	// 				return $button;
	// 			})
	// 			->rawColumns(['action'])
	// 			->make(true);
	// 	}
	// 	return view('item.index');
	// }
	public function index(Request $request) {

		if ($request->ajax()) {
			$data = Item::all();

			return DataTables::of($data)
				->addColumn('action', function ($data) {
					$button = '<a href="item/edit/' . $data->id . '" class="btn-sm btn-success">Edit</a> ';
					$button .= '<a onclick="return confirm(\'Are you sure to delete it?\')" href="item/delete/' . $data->id . '" class="btn-sm btn-danger">Delete</a>';
					return $button;
				})
				->addColumn('cate', function ($data) {
					$cate = $data->cate->name;
					return $cate;
				})
				->rawColumns(['action', 'cate'])
				->make(true);
		}
		return view('item.index');

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
		$data['category'] = Category::all();
		$data['item'] = Item::find($id);
		return view('item.edit', $data);
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
