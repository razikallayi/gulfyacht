<?php

namespace App\Helpers;


use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class Helper {

   //  public static function dateFormat($date) {
   //      if ($date) {
   //          $dt = new DateTime($date);

   //      return $dt->format("m/d/y"); // 10/27/2014
   //    }
   // }
   //

    public static function uploadImage($uploadImage,$location,$filename=null,$width=null,$height=null){
      if($location==null || $uploadImage==null){
        return;
      }
      $location = rtrim($location, '/');
      if($filename==null){
        $filename=str_random(15).time().".png";
      }else{
        $filename = $filename.".png";
      }
      ini_set('memory_limit', '-1');
      ini_set('gd.jpeg_ignore_warning', '1');
      ini_set('upload_max_filesize', '2000M');
      ini_set('post_max_size', '2000M');
      ini_set('max_execution_time',36000);
      $image = Image::make($uploadImage,'png');

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

      $uploadFolderName = 'uploads';
      if(!File::exists($uploadFolderName)) {
        File::makeDirectory($uploadFolderName);
      }

      if(!File::exists($location)) {
        File::makeDirectory($location);
      }
      $image->save($location."/".$filename);

      return response()->json([
        'filename' => $filename,
        'no_extension_filename' => rtrim($filename,'.png'),
        'location' => str_finish($location, '/'),
        'src'      => url($location."/".$filename)
        ]);
    }



    // public static function uploadImage($uploadImage,$location, $cropdata=null) {
    //     if($location==null || $uploadImage==null){
    //         return;
    //     }

    //     $filename=str_random(50).time().".png";

    //     $image = Image::make($uploadImage,'png');

    //     if(isset($cropdata)){
    //         if(!$cropdata instanceOf stdClass){
    //             $cropdata = json_decode($cropdata);
    //         }
    //         $image->crop(
    //             floor($cropdata->width),
    //             floor($cropdata->height),
    //             floor($cropdata->left),
    //             floor($cropdata->top)
    //             );
    //     }
    //     if(!File::exists($location)) {
    //         File::makeDirectory($location);
    //     }
    //     $image->save($location.$filename);
    //     return $filename;
    // }



    // public static function uploadImage(UploadedFile $uploadImage, $cropdata=null,$location) {
    //     if($location==null || $uploadImage==null){
    //         return;
    //     }

    //     $filename=str_random(50).time().".".$uploadImage->getClientOriginalExtension();

    //     $image = Image::make($uploadImage);

    //     if(isset($cropdata)){
    //         if(!$cropdata instanceOf stdClass){
    //             $cropdata = json_decode($cropdata);
    //         }
    //         $image->crop(
    //             floor($cropdata->width),
    //             floor($cropdata->height),
    //             floor($cropdata->left),
    //             floor($cropdata->top)
    //             );
    //     }
    //     if(!File::exists($location)) {
    //         File::makeDirectory($location);
    //     }
    //     $image->save($location.$filename);
    //     return $filename;
    // }


    public static function truncate($content='', $limit=200)
    {
      if (mb_strwidth($content, 'UTF-8') > $limit)
        {
          $content = wordwrap($content, $limit,"\n<br>");
          $content = mb_substr($content, 0, strpos($content, "\n<br>"),'utf-8');
          $content.="...";
        }
      return $content;
    }

/*
    public function uploadImage($file, $width, $height)
     {
       if(!empty($file)) {
         $destinationPath = public_path() . '/uploads/';

         $file = str_replace('data:image/png;base64,', '', $file);
         $img = str_replace(' ', '+', $file);
         $data = base64_decode($img);
         $filename = date('ymdhis') . '_croppedImage' . ".png";
         $file = $destinationPath . $filename;
         $success = file_put_contents($file, $data);

         // THEN RESIZE IT
         $returnData = 'uploads/' . $filename;
         $image = Image::make(file_get_contents(url($returnData)));
         $image = $image->resize($width,$height)->save($destinationPath . $filename);

         if($success){
         return $returnData;
         }
       }
     }*/
}
