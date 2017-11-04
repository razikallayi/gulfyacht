<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatType extends Model
{
       protected $fillable = [
        'name',
        'is_published',
        ];

        public static function getIdByName($slug){
        	$first = self::where('name',$slug)->firstOrFail();
        	return $first->id;
        }

}
