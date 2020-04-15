<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller {
	public function index(Request $request) {
		if ($request->ajax()) {
			$data = Customer::all();

			return DataTables::of($data)
				->addColumn('action', function ($data) {
					$button = '<a href="customer/edit/' . $data->id . '" class="btn-sm btn-success">Edit</a> ';
					$button .= '<a onclick="return confirm(\'Are you sure to delete it?\')" href="customer/delete/' . $data->id . '" class="btn-sm btn-danger">Delete</a>';
					return $button;
				})
				->addColumn('gender', function ($data) {
					$gender;
					if ($data->gender == 'L') {
						$gender = 'Laki-Laki';
					} else { $gender = 'Perempuan';}
					return $gender;
				})
				->rawColumns(['action'])
				->make(true);
		}

		return view('customer.index');

	}
	public function add() {
		return view('customer.add');
	}
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'gender' => 'required',
		]);

		Customer::insert([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'gender' => $request->gender,
		]);
		return redirect('customer')->with('message', 'Customer has been added');
	}
	public function edit(Customer $customer, $id) {
		$data['customer'] = $customer::find($id);
		return view('customer.edit', $data);
	}
	public function update(Request $request, $id) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'gender' => 'required',
		]);

		$update = Customer::find($id);
		$update->name = $request->name;
		$update->email = $request->email;
		$update->phone = $request->phone;
		$update->gender = $request->gender;

		$update->save();

		return redirect('customer')->with('message', 'Customer has been updated');
	}
	public function destroy(Customer $customer, $id) {
		$customer::find($id)->delete();
		return redirect('customer')->with('message', 'Customer has been deleted');
	}

}
