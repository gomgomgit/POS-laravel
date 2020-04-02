<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
	protected $table = 'item';

	// protected $fillable = ['name', 'category_id', 'price', 'stock'];

	public function cate() {
		return $this->belongsTo(Category::class, 'category_id');
	}

}
