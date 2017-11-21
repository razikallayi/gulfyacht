<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatType extends Model
{
	protected $fillable = [
		'name',
		'is_published',
	];

	public static function getIdsByName($names){
		if(is_array($names)){
			return self::whereIn('name',$names)->pluck('id');
		}else{
			self::where('name',$names)->pluck('id');
		}
	}
}