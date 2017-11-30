<?php

namespace App\Helpers;


use Image;
use File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class Helper {

 public static function uploadImage($uploadImage,$location,$filename=null,$width=null,$height=null){
   if($location==null || $uploadImage==null){
     return;
   }
   $location = rtrim($location, '/');
     if (!strpos($filename, '.png')) {
          
               if($filename==null){
           $filename=str_random(15).time().".png";
         }
         else{
           $filename = $filename.".png";
         }
    }


    try {
      $image = Image::make($uploadImage,'png');
    } catch (Exception $e) {
      return response()->json([
        'filename' => "",
        'no_extension_filename' => "",
        'location' => "",
        'src'      => "",
        'success' => false,
        'message' => 'Unsupported image type',
      ]);
    }
  
   if($width!=null){
   // prevent possible upsizing
     $image->resize($width, null, function ($constraint){
       $constraint->aspectRatio();
       $constraint->upsize();
     });
   }

   if($height!=null){
   // prevent possible upsizing
     $image->resize(null, $height, function ($constraint){
       $constraint->aspectRatio();
       $constraint->upsize();
     });
   }

         // prevent possible upsizing
   $image->resize(1920, null, function ($constraint) {
       $constraint->aspectRatio();
       $constraint->upsize();
   });

   if(!File::exists($location)) {
     File::makeDirectory($location,0755, true);
   }
   $image->save($location."/".$filename);

   return response()->json([
     'filename' => $filename,
     'no_extension_filename' => rtrim($filename,'.png'),
     'location' => str_finish($location, '/'),
     'src'      => url($location."/".$filename),
     'success' => true,
     'message' => 'Image succesfully uploaded',
     ]);
 }

}
