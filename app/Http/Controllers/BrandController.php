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


    public function sortView(Request $request)
    {
        $brands = Brand::orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')->get();

        return view('admin.brand.sort-brand',compact('brands'));
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


    public function store($id=null,Request $request)
    {
        if($id==null){
            $update = false;
            $titleRule ='required|unique:brands';
            $imageRule = 'required';
        }else{
            $update= true;
            $brand=Brand::find($id);
            $titleRule = 'required|unique:brands,name,'.$brand->id;
            $imageRule = '';
        }

        $rule= [
            'name'            => $titleRule,
            'image'           => $imageRule,
            'url'             => 'url|nullable',
        ];

        $this->validate($request,$rule);

        $request['slug'] = str_slug($request->name);
        if($update){
            $updated = 'Updated';
            $brand->update($request->all());
        } 
        else 
        {
            $updated = 'Added';
            $brand=Brand::create($request->all());
        }

        if($brand){
            session()->flash('status','alert-success');
            session()->flash('message','Successfully '.$updated.' <b>'.$brand->name.'</b>!');
        }else{
            session()->flash('status','alert-danger');
            session()->flash('message', 'Failed!');
        }
        return back();
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


    public function sort(Request $request)
    {
        $this->validate($request, [
            'sort' => 'required|array'
        ]);
        $counter = Brand::count();
        foreach ($request->sort as $id) {
            Brand::where('id', $id)
            ->update(['listing_order' => $counter--]);
        }
        return;
    }


}
