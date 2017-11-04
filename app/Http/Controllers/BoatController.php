<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Boat;
use App\Models\BoatType;
use App\Models\Brand;
use App\Models\Media;
use App\Helpers\Helper;

class BoatController extends Controller
{

	public function index(Request $request)
	{
      $boats = Boat::orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')->get();

		return view('admin.boat.manage-boat',compact('boats'));
	}

  public function create($id=null)
  {
    if($id != null){
      $boat = Boat::find($id);
    }
    $boatTypes = BoatType::all();
    $brands = Brand::all();

    return view('admin.boat.create-boat',compact('boat','boatTypes','brands'));
  }

  public function saveImage(Request $request){
    $this->validate($request, [
      'image' => 'required',
      'location' => 'required' ,
      ]);

    $uploadImage=$request->image;
    $location=str_finish(Boat::IMAGE_LOCATION, '/');

    return Helper::uploadImage($uploadImage, $location);
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'title'             =>'required|unique:boats',
      'type_id'           =>'required',
      'brand_id'          =>'required',
      
      'length'            =>'numeric|nullable',
      'price'             =>'numeric|nullable',
      'currency'          =>'nullable',
      'year'              =>'numeric|nullable|date_format:Y',
      'location'          =>'nullable|',
      'condition'         =>'nullable|',
      
      'email'             =>'nullable|email',
      'phone'             =>'nullable|',
      'description'       =>'nullable',
      
      'length_overall'    =>'nullable|',
      'beam'              =>'nullable|',
      'draft'             =>'nullable|',
      'engine'            =>'nullable|',
      'power'             =>'nullable|',
      'engine_hours'      =>'nullable|',
      'fuel'              =>'nullable|',
      'max_speed'         =>'nullable|',
      'cruising_speed'    =>'nullable|',
      
      'no_of_cabins'      =>'nullable|',
      'no_of_berths'      =>'nullable|',
      'no_of_heads'       =>'nullable|',
      'crew'              =>'nullable|',
      'is_featured'       =>'nullable|',
      'is_published'      =>'nullable|',
    ]);



    $request['slug'] = str_slug($request->title);
    $boat=Boat::create($request->all());
    
    if($request->hasFile('image')){
      $location=Boat::IMAGE_LOCATION;
      foreach($request->image as $img) 
      {
        $imageDetails = Helper::uploadImage($img, $location);
        $filename = $imageDetails->getData()->filename;
        
        $media = new Media;
        $media->image = $filename;
        $media->table_name = $boat->getTable();
        $media->item_id = $boat->id;
        $media->save();
      }
    }


   if($boat){
     session()->flash('status','alert-success');
     session()->flash('message','Successfully Added <b>'.$boat->title.'</b>!');
   }else{
     session()->flash('status','alert-danger');
     session()->flash('message', 'Adding Failed!');
   }
   return back();
 }


 public function edit($id)
 {
  $boat = Boat::findOrFail($id);
  return view('admin.boat.edit-boat',compact('boat'));
}

public function update($id,Request $request)
{
   $boat=Boat::find($id);
   $this->validate($request, [
     'title'            => 'required|unique:boats,title,'.$boat->id,
     'description'       =>'nullable',
     'type_id'           =>'required',
     'price'             =>'numeric|nullable',
     'year'              =>'numeric|nullable|date_format:Y',
     'location'          =>'nullable|',
     'condition'         =>'nullable|',
     'email'             =>'nullable|email',
     'phone'             =>'nullable|',
     'length_overall'    =>'nullable|',
     'beam'              =>'nullable|',
     'draft'             =>'nullable|',
     'engine'            =>'nullable|',
     'power'             =>'nullable|',
     'engine_hours'      =>'nullable|',
     'fuel'              =>'nullable|',
     'max_speed'         =>'nullable|',
     'cruising_speed'    =>'nullable|',
     'no_of_cabins'      =>'nullable|',
     'no_of_berths'      =>'nullable|',
     'no_of_heads'       =>'nullable|',
     'crew'              =>'nullable|',
     'is_featured'       =>'nullable|',
     'is_published'      =>'nullable|',
   ]);

     
     $boat->update($request->all());

    if($request->hasFile('image')){
      $location=Boat::IMAGE_LOCATION;
      foreach($request->image as $img) 
      {
        $imageDetails = Helper::uploadImage($img, $location);
        $filename = $imageDetails->getData()->filename;
        
        $media = new Media;
        $media->image = $filename;
        $media->table_name = $boat->getTable();
        $media->item_id = $boat->id;
        $media->save();
      }
    }

            // if($request->has('is_thumbnail')){
            //   Media::where('item_id',$boat->id)->update(['is_thumbnail'=>false]);
            //   $media = Media::where('image',$request->is_thumbnail)->first();
            //   $media->is_thumbnail = true;
            //   $media->save();
            // }

    if($boat){
     session()->flash('status','alert-success');
     session()->flash('message','Successfully Updated <b>'.$boat->title.'</b>!');
    }else{
     session()->flash('status','alert-danger');
     session()->flash('message', 'Updating Failed!');
    }
    return $this->index($request);
    }



    public function destroy($id=null){
      if($id!=null){
        $boat = Boat::findOrFail($id);
        $location = str_finish(Boat::IMAGE_LOCATION, '/');
        foreach ($boat->medias as $media) {
          $filename = $media->image;
          if($filename!=null){
            if(file_exists($location.$filename)){
              unlink($location.$filename);
            }
          }
          $media->delete();
        }
        $isDeleted = $boat->delete();
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


    public function deleteImage(Request $request)
    {
      $this->validate($request, [
        'filename' => 'required'
        ]);
      $location = str_finish(Boat::IMAGE_LOCATION, '/');
      $filename = $request->filename;

      $imageid = Media::where('image',$filename)->first(['id']);
      if($imageid !=null){
        $imageid->delete();
      }
      if(file_exists($location.$filename)){
        unlink($location.$filename);
      }
      return response()->json(['status'=>'success']);

    }


    public function sortImage(Request $request)
    {
      $this->validate($request, [
                      'sort' => 'required|array',
                      'boatId' => 'required|numeric',
                      ]);
      $counter = Media::where('item_id',$request->boatId)->count();
      foreach ($request->sort as $image) {
        Media::where('image', 'like',$image."%")
        ->where('item_id',$request->boatId)
        ->update(['listing_order' => $counter--]);
      }
      return;
    }

    public function sort(Request $request)
    {
      // dd($request->all());
      $this->validate($request, [
        'sort' => 'required|array',
        'page' => 'required'
        ]);
      $counter = Boat::count();
      foreach ($request->sort as $id) {
        Boat::where('id', $id)
          ->update(['listing_order' => $counter--]);
      }
      return;
    }


}
