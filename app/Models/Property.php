<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

	const IMAGE_LOCATION = 'uploads/properties';


    const CATEGORIES = [
            '1'=>['id'=>'1', 'name' => 'Rent'],
            '2'=>['id'=>'2', 'name' => 'Buy'],
            '3'=>['id'=>'3', 'name' => 'International'],
        ];

    const FURNISH = [
            '1'=>['id'=>'1', 'name' => 'Furnished'],
            '2'=>['id'=>'2', 'name' => 'Partly Furnished'],
            '3'=>['id'=>'3', 'name' => 'Unfurnished'],
        ];

        protected $fillable = [
        
        'reference_id',
        'title',
        'slug',
        'description',
        'category_id',
        'property_type_id',
        'price',
        'currency',
        'rental_period',
        'address_1',
        'address_2',
        'city',
        'country',
        'bedroom',
        'bathroom',
        'area',
        'contact_number',
        'email',
        'furnished',
        'latitude',
        'longitude',
        'title_ar',
        'description_ar',
        'is_featured',
        'is_published',
        'listing_order',
        ];

    public static function getCategoryIdFromName($name){
        $categories = collect(self::CATEGORIES);
        $category = $categories->where('name',$name)->first();
        if($category!=NULL){
            return $category['id'];
        }
        return NULL;
    }

    public static function getFurnishIdFromName($name){
        $furnishes = collect(self::FURNISH);
        $furnish = $furnishes->where('name',$name)->first();
        if($furnish!=NULL){
            return $furnish['id'];
        }
        return NULL;
    }


    public function getAddress(){
        $address = "";
        if($this->address_1 != null){
            $address = $this->address_1 .", ";
        }
        if($this->address_2 != null){
            $address .= $this->address_2 .", ";
        }
        if($this->city != null){
            $address .= $this->city .", ";
        }
        if($this->country != null){
            $address .= $this->country .", ";
        }
        $address = trim($address," ");
        $address = trim($address,",");
        return $address;
    }


    public function getThumbnail(){
        $media = $this->medias()->where('is_thumbnail',true)->first();
        if($media == null){
            $media = $this->medias()->first();
        }
        if($media == null){
            $media = new Media;
        }
        return $media;
    }


    public function medias(){
        return $this->hasMany('App\Models\Media','item_id')->where('table_name',$this->getTable())->orderBy('listing_order','desc');
    }

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


    public function type(){
        return $this->hasOne('App\Models\PropertyType','id','property_type_id');
    }

    public function amenties(){ //belongsToMany
        return $this->belongsToMany('App\Models\Amenty')->distinct() ;
    }

    public static function featured()
    {
        return self::where('is_featured','1')
        ->orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')
        ->get();
    }
}
