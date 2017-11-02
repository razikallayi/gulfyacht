<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatType extends Model
{
       protected $fillable = [
        'name',
        'is_published',
        ];
}
