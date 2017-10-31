<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenty extends Model
{
	public function properties(){
		return $this->belongsToMany('App\Models\Property','amenty_property','property_id', 'amenty_id');
	}

	protected $fillable = [
	'name',
	'is_published',
	];
}
