<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    const IMAGE_LOCATION = 'uploads/banners';

    protected $fillable = [
    'image',
    'video',
    'is_published',
    ];
}
