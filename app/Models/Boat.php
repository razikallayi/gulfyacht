<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{

	const IMAGE_LOCATION = 'uploads/boats';

        protected $fillable = [
        'title',
        'slug',
        'description',
        'type_id',
        'price',
        'currency',
        'year',
        'location',
        'condition',
        'email',
        'phone',
        'length_overall',
        'beam',
        'draft',
        'engine',
        'power',
        'engine_hours',
        'fuel',
        'max_speed',
        'cruising_speed',
        'no_of_cabins',
        'no_of_berths',
        'no_of_heads',
        'crew',
        'is_featured',
        'is_published',
        'listing_order',
        'status',
        ];


    public function images(){
        return $this->medias()->where('file_type','image');
    }

    public function videos(){
        return $this->medias()->where('file_type','video');
    }


    public function medias(){
        return $this->hasMany('App\Models\Media','item_id','id')
                ->where('table_name',$this->getTable())
                ->orderBy('listing_order','desc');
    }

    public function brand(){
        return $this->hasOne('App\Models\Brand','id','brand_id');
    }

    public function type(){
        return $this->hasOne('App\Models\BoatType','id','type_id');
    }


    public function detailPageUrl(){
        return url('boats/'.$this->slug);
    }

    public function imageUrl($imageName=null,$width=null,$height=null){
        if(is_null($imageName)){
            if(is_null($this->images)){
                return;
            }
            $imageName= $this->images->first()->file_name;
            if(!file_exists(self::IMAGE_LOCATION."/".$imageName)) {
                return ;
            }
        }
        if($width!=null && $height !=null){
            $thumbName= $width."_".$height."_".substr($imageName,0,-4);
            $original = self::IMAGE_LOCATION."/".$imageName;
            if(file_exists($thumbName)) {
                 $imageName= $thumbName;
            }else{
               if( !file_exists($original)){
                   return;
               }
               $imageDetails = Helper::uploadImage($original,self::IMAGE_LOCATION,$thumbName,$width,$height);
               $imageName =  $imageDetails->getData()->filename;
            }
        }
        return url(self::IMAGE_LOCATION."/".$imageName);
    }
}
