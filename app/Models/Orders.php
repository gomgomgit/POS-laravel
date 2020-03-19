<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {
	protected $table = "orders";

	public function owds() {
		return $this->hasMany(OrderDetail::class, 'order_id');
	}

	public function usr() {
		return $this->belongsTo(Users::class, 'user_id');
	}
}
