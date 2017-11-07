<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

	const IMAGE_LOCATION = 'uploads/brands';

        protected $fillable = [
        'name',
        'slug',
        'url',
        'image',
        'description',
        'is_featured',
        'is_published',
        'listing_order',
        'status',
        ];

    public function detailPageUrl(){
        return $this->url;
    }

    public static function getIdByName($names){
        if(is_array($names)){
            return self::whereIn('name',$names)->pluck('id');
        }else{
            return self::where('name',$names)->pluck('id');
        }
    }


    public function boats(){
        return $this->hasmany('App\Models\Boat','brand_id','id');
    }

    public function products(){
        return $this->hasmany('App\Models\Product','brand_id','id')->orderBy('created_at','desc');
    }

    public function imageUrl($imageName=null,$width=null,$height=null){
        if(is_null($imageName)){
            if(is_null($this->image)){
                return;
            }
            $imageName= $this->image;
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
