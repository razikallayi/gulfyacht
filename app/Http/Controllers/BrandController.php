<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Brand;
use App\Models\Media;
use App\Helpers\Helper;

class BrandController extends Controller
{

    public function index(Request $request)
    {
        $brands = Brand::orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')->get();

        return view('admin.brand.manage-brand',compact('brands'));
    }


    public function create($id=null)
    {
        if($id != null){
            $brand = Brand::find($id);
        }

        return view('admin.brand.create-brand',compact('brand'));
    }

    public function saveImage(Request $request){
        $this->validate($request, [
            'image' => 'required',
            'location' => 'required' ,
        ]);

        $uploadImage=$request->image;
        $location = str_finish(Brand::IMAGE_LOCATION, '/');

        return Helper::uploadImage($uploadImage, $location);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required|unique:brands',
            'image'           => 'required',
            'url'             => 'url|nullable',
        ]);

        $request['slug'] = str_slug($request->name);

        $brand=Brand::create($request->all());

        if($brand){
            session()->flash('status','alert-success');
            session()->flash('message','Successfully Added <b>'.$brand->name.'</b>!');
        }else{
            session()->flash('status','alert-danger');
            session()->flash('message', 'Adding Failed!');
        }
        return back();
    }

    public function update(Request $request)
    {
        $brand=Brand::find($id);
        $this->validate($request, [
            'name'            => 'required|unique:brands,name,'.$brand->id,
            'image'           => 'required',
            'url'             => 'url|nullable',
        ]);


        $request['slug'] = str_slug($request->name);
        $brand=Brand::update($request->all());

        if($brand){
            session()->flash('status','alert-success');
            session()->flash('message','Successfully Updated <b>'.$brand->name.'</b>!');
        }else{
            session()->flash('status','alert-danger');
            session()->flash('message', 'Updating Failed!');
        }
        return $this->index($request);
    }



    public function destroy($id=null){
        if($id!=null){
            $brand = Brand::findOrFail($id);
            $location = str_finish(Brand::IMAGE_LOCATION, '/');
            $filename = $brand->image;
            if($filename!=null){
                if(file_exists($location.$filename)){
                    unlink($location.$filename);
                }
            }
            
            $isDeleted = $brand->delete();
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
        $location = str_finish(Brand::IMAGE_LOCATION, '/');
        $filename = $request->filename;

        if(file_exists($location.$filename)){
            unlink($location.$filename);
        }
        return response()->json(['status'=>'success']);

    }

    public function sort(Request $request)
    {
        $this->validate($request, [
            'sort' => 'required|array',
            'page' => 'required'
        ]);
        $counter = Brand::count();
        foreach ($request->sort as $id) {
            Brand::where('id', $id)
            ->update(['listing_order' => $counter--]);
        }
        return;
    }


}
