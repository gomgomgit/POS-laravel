<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller {
	public function index() {
		$users['user'] = Users::all();
		return view('users.index', $users);
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
		return redirect('users');
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

		return redirect('users');
	}
	public function destroy(Users $users, $id) {
		$users::find($id)->delete();
		return redirect('users');
	}
}
