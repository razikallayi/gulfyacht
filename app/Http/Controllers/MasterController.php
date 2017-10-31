<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper;
use Validator;
use App\Mail\ContactMail;
use App\Mail\CareerMail;
use Mail;
use Session;
use Redirect;

class MasterController extends Controller
{


    public $itemCount = 13;

    public function index()
    {

        return view('project.index');
    }


    public function about()
    {
        return view('project.about');
    }


    public function boats($slug)
    {
        
        switch ($slug) {
              case 'buy':
                  # code...
                  break;
              
              case 'sell':
                  # code...
                  break;

              case 'new':
                  # code...
                  break;
              
              default:
                  # code...
                  break;
          }  
        return view('project.details');
    }

    public function detail($slug)
    {
       
        return view('project.details');
    }



    public function contact()
    {
        return view('project.contact');
    }


    public function contact_mail(Request $request)
    {
     Mail::to(ContactMail::getDestinationEmails)->send(new ContactMail($request));
     Session::flash('mail_success','Thank You!! We will contact you soon!!');
     return Redirect::to('contact');
    }


    public function career_mail(Request $request)
    {

     Mail::to(CareerMail::getDestinationEmails)->send(new CareerMail($request));
     Session::flash('mail_success','Thank You!! We will contact you soon!!');
    return Redirect::to('career');
    }



public function populateLocations(Request $request){
    if(!$request->q){
        return;
    };
    $properties =  Property::where('is_published',true)
    ->where('city','!='," ")
    ->where('city','like',"%".$request->q."%")
    ->select('city')
    ->distinct()
    ->orderBy('city')
    ->get();

    return $properties->pluck('city');
}



public function search(Request $request)
{
    $query=Property::query();
    $categoryId = 1;
    if($request->has('category')){
        $categoryId = Property::getCategoryIdFromName($request->category);
        if($categoryId !=null && $categoryId != 0){
            $query->where('category_id',$categoryId);
        }
    }
    if($request->has('type')){
        $propertyType = PropertyType::where('name',$request->type)->first();
        if($propertyType !=null){
            $query->where('property_type_id',$propertyType->id);
        }
    }

    if($request->has('country')){
        $query->where('country','like',$request->country);
    }

    if($request->has('location')){
     $query->where('city','like',$request->location)
                        ->orWhere('address_1','like',$request->location)
                        ->orWhere('address_2','like',$request->location);
    }

    if($request->has('min_price')){
     $query->where('price','>=',$request->min_price);
    }

    if($request->has('max_price')){
     $query->where('price','<=',$request->max_price);
    }

    if($request->has('bedroom')){
        $query->where('bedroom',$request->bedroom);
    }

    if($request->has('furnish')){
        $furnishId = Property::getFurnishIdFromName($request->furnish);
        if($furnishId !=null){
            $query->where('furnished',$furnishId);
        }
    }

    if($request->has('is_featured')){
        $query->where('is_featured',true);
    }

    $properties = $query->orderBy('listing_order','desc')
        ->orderBy('updated_at','desc')
        ->paginate($this->itemCount);
    return view('project.rent')
    ->with('properties' , $properties)
    ->with('categoryId' , $categoryId)
    ->withInput($request->all());
    }
}
