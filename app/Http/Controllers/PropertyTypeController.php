<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{

	public function index()
	{
		$propertyTypes=PropertyType::orderBy('name','asc')->get();
		return view('admin.property.manage-propertytype',compact('propertyTypes'));
	}


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'name'    => 'required|max:191|unique:amenties',
        ])->validate();

        $propertyType = PropertyType::create($request->all());
        if($propertyType){
             session()->flash('status','alert-success');
             session()->flash('message','Successfully Added <b>'.$propertyType->name.'</b>!');
         }else{
             session()->flash('status','alert-danger');
             session()->flash('message', 'Adding Failed!');
         }
        return back();
    }


//TODO: check if property exist. give 2 option,1)remove all property and category. 2)remove category only, but product should work
    public function destroy($id=null){
        if($id!=null){
            $propertyType = PropertyType::findOrFail($id);
            $isDeleted =  $propertyType->delete();
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
}
