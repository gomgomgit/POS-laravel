<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
	public function check(Request $req) {
		$this->validate($req, [
			'email' => 'required',
			'password' => 'required',
		]);
		$data = Users::where('email', $req->email)->first();
		if ($data) {
			$pass = hash::check($req->password, $data->password);
			if ($pass) {
				$req->session()->put('email', $data->email);

				$data['category'] = Category::all();
				return view('category.index', $data);
			} else {
				return redirect('/')->with('pass', 'Password salah');
			}
		} else {return redirect('/')->with('email', 'Email belum terdaftar');}
	}
}
