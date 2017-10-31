<div class="rs sec1">
  <div class="container">
     <div class="col-md-12 no-padding">
        <h1>Featured  <span> Properties </span></h1>
            <p>Check the best property</p>
       <div class="row">
  @inject("Property","App\Models\Property")
  @foreach($Property->where('is_published',true)
                  ->where('is_featured',true)
                  ->take(3)
                  ->orderBy('id','desc')
                  ->get() as $property)

      {{--
 <div class="col-md-4 sec-mar">
            <a href="{{url('property/'.$property->slug)}}">
               <div class="col-md-6 no-padding"><div class="sec1-img">
               @if($property->medias->first() != null)
            <img src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}}">
            @endif
               </div></div>
               <div class="col-md-6 no-padding">
                 <div class="sec1-det">
                    <h2>{{str_limit($property->title,15)}}</h2>
                    <p> <i class="avenueicon-placeholder"></i>  {{ str_limit($property->getAddress(),34)}}</p>
                 </div>
               </div>
               <div class="col-md-12 no-padding spl">
               
                 <div class="pc"> {{number_format($property->price)}} {{$property->currency}}</div>
                 <div class="link"><i class="avenueicon-external-link"></i></div>
               </div>
            </a>
         </div>
--}}

<div class="col-md-4">
         <a href="{{url('property/'.$property->slug)}}">
          <div class="sec2-img" >
            @if($property->medias->first() != null)
            <img src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}}">
            @endif
          </div>
          <div class="sec-det clearfix">
            <div class="faci">
             <ul>
               @if($property->bedroom != null)
                  @if($property->bedroom == -1)
                    <li><img src="{{url('gulf/images/studio.png')}}"></li>
                  @else
                    <li><img src="{{url('gulf/images/bd.png')}}"> X {{$property->bedroom}}</li>
                  @endif
               @endif
               @if($property->bathroom != null)
               <li><img src="{{url('gulf/images/bath.png')}}"> X {{$property->bathroom}}</li>
               @endif
             </ul>
           </div>
           @if($property->price != null)
           <div class="pr-sec2">{{number_format($property->price)}} {{$property->currency}}</div>
           @endif
         </div>
         <div class="sec2-mdet"><h4>{{str_limit($property->title,38)}}</h4><p> <i class="avenueicon-placeholder"></i> {{ str_limit($property->getAddress(),45)}}</p></div>
       </a>
     </div>

@endforeach
         
         </div>
     </div>
  </div>
</div>