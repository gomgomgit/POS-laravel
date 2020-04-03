<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$data['category'] = Category::all();
		return view('category.index', $data);
	}
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required',
		]);

		Category::create([
			'name' => $request->name,
		]);
		// Category::insert([
		// 	'name' => $request->name,
		// ]);

		return redirect('category')->with('message', 'Category has been added');
	}
	public function delete($id) {
		$delete = Category::find($id);
		$delete->delete();

		return redirect()->back()->with('message', 'Category has been deleted');

	}
	public function edit($id) {
		$edit['category'] = Category::find($id);

		return view('category.edit', $edit);
	}
	public function update($id, Request $request) {
		$this->validate($request, [
			'name' => 'required',
		]);

		$update = Category::find($id);
		$update->name = $request->name;
		$update->save();

		return redirect('category')->with('message', 'Category has been updated'); //jadi with fash data session parameter1 sebagai variable dalam session dan parameter2 sebagai isinya
	}
}
