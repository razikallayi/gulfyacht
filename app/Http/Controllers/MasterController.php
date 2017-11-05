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


    public $itemCount = 50;

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
                'page'=>strtolower($request->get('type','buy')),
                'filterLimits'=>$this->getFilterLimits()
            ]);
        }

        $boats = Boat::query();

        if($request->has('type') && $request->get('type','buy') != 'buy'){
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


        $boats = $boats->select('id','title','description','price','currency','slug','location')
                ->paginate($this->itemCount);

        foreach($boats->items() as $boat){
            $boat->imageUrl = $boat->imageUrl();
            $boat['description'] = str_limit($boat->description);
            unset($boat->images);
            $boat->detailPageUrl = $boat->detailPageUrl();
        };

        $search = [ 
            'boats'=> $boats,
            'page'=>$request->type?strtolower($request->type):'buy'];
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


}
