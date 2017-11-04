<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactMail;
use App\Mail\CareerMail;
use Mail;
use Session;
use Redirect;
use App\Models\Boat;
use App\Models\BoatType;
use App\Models\Brand;

class MasterController extends Controller
{


    public $itemCount = 13;

    public function index()
    {
        $brands = Brand::orderBy('listing_order','desc')->with('boats')->orderBy('updated_at','desc')->get();
        return view('project.index',compact('brands'));
    }


    public function about()
    {
        return view('project.about');
    }

    public function sell()
    {
        return view('project.sell');
    }


    public function boats($slug,Request $request)
    {
        $boats=Boat::query();
        $page = $slug = strtolower($slug);
        $brands = $brands = Brand::orderBy('listing_order','desc')->orderBy('updated_at','desc')->get();

        switch ($slug) {
            case 'buy':
            $request['type']=$slug;
            return $this->search($request);
            break;
            
            case 'used':
            $request['type']=$slug;
            return $this->search($request);
            break;

            case 'new':
            $request['type']=$slug;
            return $this->search($request);
            break;

            default:
            $boat = Boat::where('slug',$slug)->firstOrFail();
            $boat->increasePopularity();
            return view('project.details',compact('boat'));
            break;
        }
    }


    public function search(Request $request)
    {
        if (!$request->ajax()) {
            $brands = $brands = Brand::orderBy('listing_order','desc')->orderBy('updated_at','desc')->get();
            return view('project.boats')->with([
                'brands'=>$brands,
                'page'=>strtolower($request->type),
                'filterLimits'=>$this->getFilterLimits()
            ]);
        }

        $boats = Boat::query();

        if($request->has('type')){
            $typeId  = BoatType::getIdByName($request->type);
            $boats= $boats->where('type_id',$typeId);
        }
        

        if($request->has('brands')){
            $brands=  Brand::getIdByName($request->brands);
            if($brands != null){
                $boats->whereIn('brand_id',$brands);
            }
        }


        if($request->has('min-length')){
            $boats->where('length','>=',$request->get('min-length'));
        }
        
        if($request->has('max-length')){
            $boats->where('length','<=',$request->get('max-length'));
        }

        if($request->has('min-year')){
            $boats->where('year','>=',$request->get('min-year'));
        }

        if($request->has('max-year')){
            $boats->where('year','<=',$request->get('max-year'));
        }


        if($request->has('min-price')){
            $boats->where('price','>=',$request->get('min-price'));
        }


        if($request->has('max-price')){
            $boats->where('price','<=',$request->get('max-price'));
        }

        if($request->has('sort')){
            $sort= explode('-',$request->sort);
            switch ($sort[0]){
                case 'price':
                $boats->orderBy('price',$sort[1])->orderBy('created_at','desc');
                break;
                case 'new':
                $boats->orderBy('created_at','desc');
                break;
                default:
                $boats->orderBy('popularity','desc')->orderBy('created_at','desc');
                break;
            }
        }


        $boats = $boats->select('id','title','description','price','currency','location')->paginate(8);

        foreach($boats->items() as $boat){
            $boat->imageUrl = $boat->imageUrl();
            $boat['description'] = str_limit($boat->description);
            unset($boat->images);
            $boat->detailPageUrl = $boat->detailPageUrl();
        };

        $search = [ 
            'boats'=> $boats,
            'page'=>$request->type?strtolower($request->type):'new'];
        return $search;
        }


    public function contact()
    {
        return view('project.contact');
    }


        public function getFilterLimits(){
            return Boat::select(
                \DB::raw('min(length) as min_length'),
                \DB::raw('max(length) as max_length'),

                \DB::raw('min(year) as min_year'),
                \DB::raw('max(year) as max_year'),

                \DB::raw('min(price) as min_price'),
                \DB::raw('max(price) as max_price')
            )->first()->toArray();
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


/*
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
}*/
}
