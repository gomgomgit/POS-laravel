<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'category'; //berisi nama table pada database
	protected $fillable = ['name'];

	public function cwi() {
		return $this->hasMany(Item::class);
	}
}
