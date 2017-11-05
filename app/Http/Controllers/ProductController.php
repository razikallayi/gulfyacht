<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Media;
use App\Helpers\Helper;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')->get();

        return view('admin.product.manage-product',compact('products'));
    }


    public function create($id=null)
    {
        if($id != null){
            $product = Product::find($id);
        }

           $brands = Brand::all();

        return view('admin.product.create-product',compact('product','brands'));
    }

    public function saveImage(Request $request){
        $this->validate($request, [
            'image' => 'required',
            'location' => 'required' ,
        ]);

        $uploadImage=$request->image;
        $location = str_finish(Product::IMAGE_LOCATION, '/');

        return Helper::uploadImage($uploadImage, $location);
    }


    public function store($id=null,Request $request)
    {
        if($id==null){
            $update = false;
            $imageRule = 'required';
        }else{
            $update= true;
            $product=Product::find($id);
            $imageRule = '';
        }

        $rule= [
            'brand_id'           => 'required',
            'image'           => $imageRule,
            'url'             => 'url|nullable',
        ];

        $this->validate($request,$rule);

        $request['slug'] = str_slug($request->name);
        if($update){
            $updated = 'Updated';
            $product->update($request->all());
        } 
        else 
        {
            $updated = 'Added';
            $product=Product::create($request->all());
        }

        if($product){
            session()->flash('status','alert-success');
            session()->flash('message','Successfully '.$updated.' <b>'.$product->name.'</b>!');
        }else{
            session()->flash('status','alert-danger');
            session()->flash('message', 'Failed!');
        }
        return back();
    }



    public function destroy($id=null){
        if($id!=null){
            $product = Product::findOrFail($id);
            $location = str_finish(Product::IMAGE_LOCATION, '/');
            $filename = $product->image;
            if($filename!=null){
                if(file_exists($location.$filename)){
                    unlink($location.$filename);
                }
            }

            $isDeleted = $product->delete();
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
            'page' => 'required'
        ]);
        $counter = Product::count();
        foreach ($request->sort as $id) {
            Product::where('id', $id)
            ->update(['listing_order' => $counter--]);
        }
        return;
    }


}
