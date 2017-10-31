<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Banner;
use App\Helpers\Helper;

class BannerController extends Controller
{

	public function index()
	{
		$banners=Banner::orderBy('listing_order','desc')->get();
		return view('admin.banner.manage-banner',compact('banners'));
	}

    public function create()
    {
        return view('admin.banner.add-banner');
    }

    public function saveImage(Request $request){
        $this->validate($request, [
                        'image' => 'required',
                        'location' => 'required' ,
                        ]);

        $uploadImage=$request->image;
        $location=$request->location;

        return Helper::uploadImage($uploadImage, $location);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'image'            => 'required',
           // 'is_published'  => '',
           ])->validate();

        if(is_array($request->image)){
          // $request['image'] = $request->image[0];
          foreach ($request->image as $image) {
            $request['image'] = $image;
            $banner=Banner::create($request->all());
          }
        }

        if($banner){
             session()->flash('status','alert-success');
             session()->flash('message','Successfully Added <b>'.$banner->title.'</b>!');
         }else{
             session()->flash('status','alert-danger');
             session()->flash('message', 'Adding Failed!');
         }
        return back();
    }


    public function destroy($id=null){
      if($id!=null){
        $banner = Banner::findOrFail($id);

        $location = str_finish(Banner::IMAGE_LOCATION, '/');
        $filename = $banner->image;
        if($filename!=null){
          if(file_exists($location.$filename)){
            unlink($location.$filename);
          }
        }
        
        $isDeleted = $banner->delete();
        if($isDeleted){
             session()->flash('status','alert-success');
             session()->flash('message','Successfully Removed!');
         }else{
             session()->flash('status','alert-danger');
             session()->flash('message', 'Deleting Failed!');
         }
      }
      return back();
    }


    public function sort(Request $request)
    {
      $this->validate($request, [
        'sort' => 'required|array',
        ]);
      $counter = Banner::count();
      foreach ($request->sort as $bannerId) {
        Banner::where('id', $bannerId)
          ->update(['listing_order' => $counter--]);
      }
      return;
    }


}
