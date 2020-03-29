<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Users;
use Illuminate\Http\Request;

class LoginController extends Controller {
	public function check(Request $req) {
		$this->validate($req, [
			'email' => 'required',
		]);
		$check['ck'] = Users::find($req->email);
		if ($check) {
			$data['category'] = Category::all();
			return view('category.index', $data);
		} else {echo "error";}
	}
}
