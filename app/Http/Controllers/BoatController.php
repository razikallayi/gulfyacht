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
      'description'       =>'nullable',
      'type_id'           =>'required',
      'price'             =>'numeric|nullable',
      'year'              =>'numeric|nullable',
      'location'          =>'',
      'condition'         =>'',
      'email'             =>'',
      'phone'             =>'',
      'length_overall'    =>'',
      'beam'              =>'',
      'draft'             =>'',
      'engine'            =>'',
      'power'             =>'',
      'engine_hours'      =>'',
      'fuel'              =>'',
      'max_speed'         =>'',
      'cruising_speed'    =>'',
      'no_of_cabins'      =>'',
      'no_of_berths'      =>'',
      'no_of_heads'       =>'',
      'crew'              =>'',
      'is_featured'       =>'',
      'is_published'      =>'',
    ]);



    $request['slug'] = str_slug($request->title);
    $boat=Boat::create($request->all());
    if(is_array($request->amenty)){
      $amenties = Amenty::find(array_keys($request->amenty));
      $boat->amenties()->saveMany($amenties);
    }
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
        //  $media = Media::where('image',$request->is_thumbnail)->first();
        //  $media->is_thumbnail = true;
        //  $media->save();
        // }

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
   $validator = Validator::make($request->all(), [
     'title'            => 'required|unique:boats,title,'.$boat->id,
     'reference_id'            => 'required',
             'category_id'      => 'required',
             // 'image'            => 'required',
              'image.*'            => 'image|max:2048',
             'reference_id' => 'required',
             'boat_type_id' => 'required',
             // 'description'      => '',
             'price'            => 'nullable|numeric|min:0',
             'currency'            => 'nullable',
             // 'address_1'        => '',
             // 'address_2'        => '',
             // 'city'             => '',
             // 'country'          => '',
             'bedroom'          => 'nullable|numeric|min:-1',
             'bathroom'         => 'nullable|numeric|min:0',
             // 'area'             => '',
             // 'contact_number'   => '',
             'email'            => 'nullable|email',
             // 'amenties'         => '',
             // 'furnished'        => '',
             // 'latitude'         => '',
             // 'longitude'        => '',
             // 'title_ar'         => '',
             // 'description_ar'   => '',
             // 'is_featured'      => '',
             // 'is_published'     => '',
     ])->validate();

     $boat->reference_id            = $request->reference_id;
     $boat->title            = $request->title;
     $boat->slug             = str_slug($request->title);
     $boat->description      = $request->description;
     $boat->category_id      = $request->category_id;
     $boat->boat_type_id = $request->boat_type_id;
     $boat->price            = $request->price;
     $boat->currency            = $request->currency;
     $boat->rental_period            = $request->rental_period;
     $boat->address_1        = $request->address_1;
     $boat->address_2        = $request->address_2;
     $boat->city             = $request->city;
     $boat->country          = $request->country;
     $boat->bedroom          = $request->bedroom;
     $boat->bathroom         = $request->bathroom;
     $boat->area             = $request->area;
     $boat->contact_number   = $request->contact_number;
     $boat->email            = $request->email;
     $boat->furnished        = $request->furnished;
     $boat->latitude         = $request->latitude;
     $boat->longitude        = $request->longitude;
     $boat->title_ar         = $request->title_ar;
     $boat->description_ar   = $request->description_ar;
     $boat->is_featured      = $request->is_featured?true:false;
     $boat->is_published     = $request->is_published?true:false;
     $boat->save();

      $boat->amenties()->detach();
      if(is_array($request->amenty)){
        $amenties = Amenty::find(array_keys($request->amenty));
        $boat->amenties()->saveMany($amenties);
      }

            // if($request->has('image')){
            //     foreach ($request->image as $image) {
            //         $media = new Media;
            //         $media->image = $image;
            //         $media->table_name = $boat->getTable();
            //         $media->item_id = $boat->id;
            //         $media->save();
            //     }
            // }

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
