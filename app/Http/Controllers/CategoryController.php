<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
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

		return redirect('category');
	}
	public function delete($id) {
		$delete = Category::find($id);
		$delete->delete();

		return redirect()->back()->with('delete', 'Category has been deleted');

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

		return redirect('category');
	}
}
