<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Faq;
use App\Helpers\Helper;

class FaqsController extends Controller
{

	public function index()
	{
		$faqs=Faq::orderBy('id','desc')->get();
		return view('admin.faq.manage-faq',compact('faqs'));
	}

    public function create()
    {
        return view('admin.faq.add-faq');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'question'            => 'required',
           'answer'          => 'required',
           'question_ar'       => '',
           'answer_ar'       => '',
           // 'is_published'     => '',
           ])->validate();


        $request['is_published'] = $request->is_published?true:false;
        $faq=Faq::create($request->all());

        if($faq){
             session()->flash('status','alert-success');
             session()->flash('message','Successfully Added <b>'.$faq->question.'</b>!');
         }else{
             session()->flash('status','alert-danger');
             session()->flash('message', 'Adding Failed!');
         }
        return back();
    }


    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
      return view('admin.faq.edit-faq',compact('faq'));
  }

  public function update($id,Request $request)
  {
         $validator = Validator::make($request->all(), [
           'question'            => 'required',
           'answer'          => 'required',
           'question_ar'       => '',
           'answer_ar'       => '',
           // 'is_published'     => '',
           ])->validate();
      

        $faq=Faq::findOrFail($id);
        
        $faq->question        = $request->question;
        $faq->answer      = $request->answer;
        $faq->question_ar     = $request->question_ar;
        $faq->answer_ar   = $request->answer_ar;
        $faq->is_published = $request->is_published?true:false;
        $faq->save();

        if($faq){
             session()->flash('status','alert-success');
             session()->flash('message','Successfully Updated <b>'.$faq->question.'</b>!');
         }else{
             session()->flash('status','alert-danger');
             session()->flash('message', 'Upadating Failed!');
         }
        return back();
    }



    public function destroy($id=null){
      if($id!=null){
        $faq = Faq::findOrFail($id);
        $isDeleted = $faq->delete();
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
