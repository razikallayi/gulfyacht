<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Property;
use App\Models\Media;
use App\Models\Amenty;
use App\Models\PropertyType;
use App\Helpers\Helper;

class PropertyController extends Controller
{

	public function index(Request $request)
	{
		if($request->page=='featured'){
     $properties = Property::featured();
     $page = 'featured';
    }else{
      $properties = Property::orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')->get();
      $page = 'manage';
    }
		return view('admin.property.manage-property',compact('properties','page'));
	}

    // featured
    // public function featuredProperty()
    // {
    //   $properties = Property::featured();
    //   $page = 'featured';
    //   return view('admin.property.manage-property',compact('properties','page'));

    // }
    
    public function propertiesCardView(Request $request)
    {
          if($request->page=='featured'){
           $properties = Property::featured();
           $page = 'featured';
          }else{
            $properties = Property::orderBy('listing_order','desc')
            ->orderBy('updated_at','desc')
            ->get();
            $page = 'manage';
          }
      return view('admin.property.sort-property',compact('properties','page'));

    }

  public function create()
  {
    return view('admin.property.add-property');
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

 // dd($request->all());

    $validator = Validator::make($request->all(), [
     'title'            => 'required|unique:properties',
     'reference_id'            => 'required',
           'category_id'      => 'required',
           'image'            => 'required',
           'image.*'            => 'image|max:2048',
           'reference_id' => 'required',
           'property_type_id' => 'required',
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



    $request['slug'] = str_slug($request->title);
    $property=Property::create($request->all());
    if(is_array($request->amenty)){
      $amenties = Amenty::find(array_keys($request->amenty));
      $property->amenties()->saveMany($amenties);
    }
    if($request->hasFile('image')){
      $location=Property::IMAGE_LOCATION;
      foreach($request->image as $img) 
      {
        $imageDetails = Helper::uploadImage($img, $location);
        $filename = $imageDetails->getData()->filename;
        
        $media = new Media;
        $media->image = $filename;
        $media->table_name = $property->getTable();
        $media->item_id = $property->id;
        $media->save();
      }
    }

        // if($request->has('is_thumbnail')){
        //  $media = Media::where('image',$request->is_thumbnail)->first();
        //  $media->is_thumbnail = true;
        //  $media->save();
        // }

    if($property){
     session()->flash('status','alert-success');
     session()->flash('message','Successfully Added <b>'.$property->title.'</b>!');
   }else{
     session()->flash('status','alert-danger');
     session()->flash('message', 'Adding Failed!');
   }
   return back();
 }


 public function edit($id)
 {
  $property = Property::findOrFail($id);
  return view('admin.property.edit-property',compact('property'));
}

public function update($id,Request $request)
{
   $property=Property::find($id);
   $validator = Validator::make($request->all(), [
     'title'            => 'required|unique:properties,title,'.$property->id,
     'reference_id'            => 'required',
             'category_id'      => 'required',
             // 'image'            => 'required',
              'image.*'            => 'image|max:2048',
             'reference_id' => 'required',
             'property_type_id' => 'required',
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

     $property->reference_id            = $request->reference_id;
     $property->title            = $request->title;
     $property->slug             = str_slug($request->title);
     $property->description      = $request->description;
     $property->category_id      = $request->category_id;
     $property->property_type_id = $request->property_type_id;
     $property->price            = $request->price;
     $property->currency            = $request->currency;
     $property->rental_period            = $request->rental_period;
     $property->address_1        = $request->address_1;
     $property->address_2        = $request->address_2;
     $property->city             = $request->city;
     $property->country          = $request->country;
     $property->bedroom          = $request->bedroom;
     $property->bathroom         = $request->bathroom;
     $property->area             = $request->area;
     $property->contact_number   = $request->contact_number;
     $property->email            = $request->email;
     $property->furnished        = $request->furnished;
     $property->latitude         = $request->latitude;
     $property->longitude        = $request->longitude;
     $property->title_ar         = $request->title_ar;
     $property->description_ar   = $request->description_ar;
     $property->is_featured      = $request->is_featured?true:false;
     $property->is_published     = $request->is_published?true:false;
     $property->save();

      $property->amenties()->detach();
      if(is_array($request->amenty)){
        $amenties = Amenty::find(array_keys($request->amenty));
        $property->amenties()->saveMany($amenties);
      }

            // if($request->has('image')){
            //     foreach ($request->image as $image) {
            //         $media = new Media;
            //         $media->image = $image;
            //         $media->table_name = $property->getTable();
            //         $media->item_id = $property->id;
            //         $media->save();
            //     }
            // }

    if($request->hasFile('image')){
      $location=Property::IMAGE_LOCATION;
      foreach($request->image as $img) 
      {
        $imageDetails = Helper::uploadImage($img, $location);
        $filename = $imageDetails->getData()->filename;
        
        $media = new Media;
        $media->image = $filename;
        $media->table_name = $property->getTable();
        $media->item_id = $property->id;
        $media->save();
      }
    }

            // if($request->has('is_thumbnail')){
            //   Media::where('item_id',$property->id)->update(['is_thumbnail'=>false]);
            //   $media = Media::where('image',$request->is_thumbnail)->first();
            //   $media->is_thumbnail = true;
            //   $media->save();
            // }

    if($property){
     session()->flash('status','alert-success');
     session()->flash('message','Successfully Updated <b>'.$property->title.'</b>!');
    }else{
     session()->flash('status','alert-danger');
     session()->flash('message', 'Updating Failed!');
    }
    return $this->index($request);
    }



    public function destroy($id=null){
      if($id!=null){
        $property = Property::findOrFail($id);
        $location = str_finish(Property::IMAGE_LOCATION, '/');
        foreach ($property->medias as $media) {
          $filename = $media->image;
          if($filename!=null){
            if(file_exists($location.$filename)){
              unlink($location.$filename);
            }
          }
          $media->delete();
        }
        $isDeleted = $property->delete();
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
      $location = str_finish(Property::IMAGE_LOCATION, '/');
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
                      'propertyId' => 'required|numeric',
                      ]);
      $counter = Media::where('item_id',$request->propertyId)->count();
      foreach ($request->sort as $image) {
        Media::where('image', 'like',$image."%")
        ->where('item_id',$request->propertyId)
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
      $counter = Property::count();
      foreach ($request->sort as $id) {
        Property::where('id', $id)
          ->update(['listing_order' => $counter--]);
      }
      return;
    }


}
