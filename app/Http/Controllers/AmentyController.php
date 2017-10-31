<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Amenty;

class AmentyController extends Controller
{

	public function index()
	{
		$amenties=Amenty::orderBy('name','asc')->get();
		return view('admin.property.manage-amenty',compact('amenties'));
	}


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'name'    => 'required|max:191|unique:amenties',
        ])->validate();

        $amenty = Amenty::create($request->all());
        if($amenty){
             session()->flash('status','alert-success');
             session()->flash('message','Successfully Added <b>'.$amenty->name.'</b>!');
         }else{
             session()->flash('status','alert-danger');
             session()->flash('message', 'Adding Failed!');
         }
        return back();
    }

    public function destroy($id=null){
        if($id!=null){
            $amenty = Amenty::findOrFail($id);
            $isDeleted =  $amenty->delete();
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
