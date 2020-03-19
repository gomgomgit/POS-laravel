<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {
	protected $table = 'order_detail';

	public function dwi() {
		return $this->belongsTo(Item::class, 'item_id');
	}
}
