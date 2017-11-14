<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Brand;
use App\Models\Product;
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
            $count = Product::where('brand_id',$id)->count();
            if($count > 0){


                $deleteButton ='<a href="#" class="pull-right btn btn-lg btn-default close" data-dismiss="alert" aria-label="close">X</a> <a class="btn btn-danger btn-xs" onclick="if(!confirm(\'Are you sure want to delete. All products under this brand will be removed?\')) return false;event.preventDefault();
                document.getElementById(\'f-delete-form-'.$id.'\').submit();">
                <form id="f-delete-form-'.$id.'" action="'.url('admin/brands/delete/'. $id).'" method="post" style="display: none;">
                '. csrf_field() . method_field("DELETE") .'
                </form><i class="material-icons">delete</i> Delete Brand & Products</a>';

                $product = ' products';
                $arbiterry = ' are ';
                if($count==1){$product = ' product';$arbiterry=' is ';}
                session()->flash('status','alert-warning');
                session()->flash('message','There '.$arbiterry.$count.$product.'  in this brand. Please remove the '.$product.' before category  '.$deleteButton);
                return back();
            }

            $Brand = Brand::findOrFail($id);
            $isDeleted =  $Brand->delete();
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


    public function forceDestroy($id=null){
        if($id!=null){
            $brand = Brand::findOrFail($id);
            $products = Product::where("brand_id",$brand->id);
            foreach($products->get(['id','name','image']) as $product){
                $location = str_finish(Product::IMAGE_LOCATION, '/');
                $filename = $product->image;
                if($filename!=null){
                    if(file_exists($location.$filename)){
                        unlink($location.$filename);
                    }
                }
            }
            $products->delete();

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
