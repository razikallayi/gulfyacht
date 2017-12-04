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
        $menu = 'boats';
        $boats = Boat::orderBy('listing_order','desc');
        if($request->menu == 'inventory'){
            $boats=$boats->where('menu','inventory');
            $menu='inventory';
        } else{
            $boats=$boats->where('menu','boats');
        }
        $boats = $boats->orderBy('updated_at','desc')->get();

        return view('admin.boat.manage-boat',compact('boats','menu'));
    }

    public function create($id=null,Request $request)
    {
        $menu = 'boats';
        if($request->menu == 'inventory'){
            $menu='inventory';
        }
        if($id != null){
            $boat = Boat::find($id);
        }
        $boatTypes = BoatType::all();
        $brands = Brand::all();

        return view('admin.boat.create-boat',compact('boat','boatTypes','brands','menu'));
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


    public function store($id=null,Request $request)
    {
        if($id==null){
            $update = false;
            $title_rule ='required|unique:boats';
        }else{
            $update= true;
            $boat=Boat::findOrFail($id);
            $title_rule = 'required|unique:boats,title,'.$boat->id;
        }

        $rule = [
            'title'             =>$title_rule,
            'type_id'           =>'required',
            'brand_id'          =>'required',

            'length_in_unit'    =>'numeric|nullable',
            'length_unit'       =>'in:Metre,Feet',
            'color'             =>'nullable',
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
        ];

        $this->validate($request, $rule);

        if($request->year == null){
            $request['year'] = 0;
        }

        if($request->price == null){
            $request['price'] = 0;
        }

        if($request->length_in_unit == null){
            $request['length'] = 0;
        }else if($request->length_unit == 'Metre'){
            $request['length'] = $this->toFeet($request->length_in_unit);
        }else{
            $request['length'] = $request->length_in_unit;
        }

        if($request->currency == null){
            $request['currency'] = 'QAR';
        }

        $request['slug'] = str_slug($request->title);

        if($update){
            $updated = 'Updated';
            $boat->update($request->all());
        } 
        else 
        {
            $updated = 'Added';
            $boat=Boat::create($request->all());
        }

        if($request->hasFile('image')){
            $location=Boat::IMAGE_LOCATION;
            $errorCount=0;
            foreach($request->file('image') as $img) 
            {
                $imageDetails = Helper::uploadImage($img, $location);
                $uploadedImage = $imageDetails->getData();
                if(!$uploadedImage->success){
                    $errorCount++;
                    continue;
                }
                $filename = $uploadedImage->filename;

                $media = new Media;
                $media->file_name = $filename;
                $media->file_type = 'image';
                $media->location = $location;
                $media->table_name = $boat->getTable();
                $media->item_id = $boat->id;
                $media->save();
            }
            if($errorCount > 0){
                $warningMessage = "<b>".$errorCount ."</b> images were not uploaded due to unsupported format/content.";
                session()->flash('status','alert-warning');
                session()->flash('message','Successfully '.$updated.' <b>'.$boat->title.'</b>!<br/>'.$warningMessage);
                return back();
            }
        }



        if($boat){
            session()->flash('status','alert-success');
            session()->flash('message','Successfully '.$updated.' <b>'.$boat->title.'</b>!');
        }else{
            session()->flash('status','alert-danger');
            session()->flash('message', 'Failed!');
        }
        return back();
    }

    private function toFeet($valueInMetre){
        return floatval($valueInMetre) * 3.2808399;
    }
    public function destroy($id=null){
        if($id!=null){
            $boat = Boat::findOrFail($id);
            $location = str_finish(Boat::IMAGE_LOCATION, '/');
            foreach ($boat->medias as $media) {
                $filename = $media->file_name;
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

        $imageid = Media::where('file_name',$filename)->first(['id']);
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
            Media::where('file_name', 'like',$image."%")
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
