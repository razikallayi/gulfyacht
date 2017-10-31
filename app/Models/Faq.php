<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

	protected $fillable = [
	'question',
	'answer',
	'question_ar',
	'answer_ar',
	'is_published',
	];

    public function translate($key='', $locale = 'ar')
    {
        $key_locale = $key."_".$locale;
        if (!array_key_exists($key_locale, $this->attributes)) {
            return $this->attributes[$key];
        }
        if($this->attributes[$key_locale] == "" || is_null($this->attributes[$key_locale])){
            return $this->attributes[$key];
        };
        return $this->attributes[$key_locale];
    }
}
