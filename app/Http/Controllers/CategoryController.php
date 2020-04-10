<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	public function index(Request $request) {
		if ($request->ajax()) {
			$data = Category::all();

			return DataTables::of($data)
				->addColumn('action', function ($data) {
					$button = '<a href="category/edit/' . $data->id . '" class="btn-sm btn-success">Edit</a>';
					$button .= '<a onclick="return confirm(\'Are you sure to delete it?\')" href="category/delete/' . $data->id . '" class="btn-sm btn-danger">Delete</a>';
					return $button;
				})
				->rawColumns(['action'])
				->make(true);
		}

		return view('category.index');
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
