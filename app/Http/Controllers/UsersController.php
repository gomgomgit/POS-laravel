<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsersController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
	// public function index() {
	// 	$users['user'] = Users::all();
	// 	return view('users.index', $users);
	// }
	public function index(Request $request) {
		if ($request->ajax()) {
			$data = Users::all();

			return DataTables::of($data)
				->addColumn('action', function ($data) {
					$button = '<a href="users/edit/' . $data->id . '" class="btn-sm btn-success">Edit</a> ';
					$button .= '<a onclick="return confirm(\'Are you sure to delete it?\')" href="users/delete/' . $data->id . '" class="btn-sm btn-danger">Delete</a>';
					return $button;
				})
				->rawColumns(['action'])
				->make(true);
		}
		return view('users.index');
		// return $dataTable->render('users.index');
	}
	public function add() {
		return view('users.add');
	}
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'password' => 'required',
		]);

		Users::insert([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
		]);
		return redirect('users')->with('message', 'User has been added');
	}
	public function edit(Users $users, $id) {
		$data['user'] = $users::find($id);
		return view('users.edit', $data);
	}
	public function update(Request $request, $id) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
		]);

		$update = Users::find($id);
		$update->name = $request->name;
		$update->email = $request->email;

		if ($request->password) {
			$update->password = $request->password;
		};

		$update->save();

		return redirect('users')->with('message', 'User has been updated');
	}
	public function destroy(Users $users, $id) {
		$users::find($id)->delete();
		return redirect('users')->with('message', 'User has been deleted'); //jadi with fash data session parameter1 sebagai variable dalam session dan parameter2 sebagai isinya
	}
}
