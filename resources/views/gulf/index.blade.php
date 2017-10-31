@extends('gulf.layout.master')

@section('content')
<div class="banner">
  <div class="tp-banner-container">
    <div class="tp-banner" >
     <ul>
      @if($banners!=null)
      @foreach($banners as $banner)
      <li data-transition="{{['slidedown','fade'][array_rand (['slidedown','fade'])]}}" data-slotamount="7" data-masterspeed="1000" >
        <img src="{{url(App\Models\Banner::IMAGE_LOCATION.'/'.$banner->image)}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
      </li>
      @endforeach
      @else
      <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
       <img src="{{url('gulf/images/slider.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
     </li>

     <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000" >
       <img src="{{url('gulf/images/slider2.jpg')}}"  alt=""  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
     </li> 
     @endif
   </ul>
   <div class="tp-bannertimer"></div>
 </div>
</div>
</div>

@section('searchtype','serch-bx')
@section('searchwidth','')
@include('gulf.layout.partials.search')


<div class="sec1 main">
 <div class="container">
  <div class="col-md-12 no-padding">
   <div class="row">
     @if($featuredProperties!=null)
     @foreach($featuredProperties->chunk(3) as $chunk)
     <div class="col-md-12 no-padding margin-bottom-30">
       @foreach($chunk as $property)
{{--
       <div class="col-md-4 sec-mar">
        <a href="{{url('property/'.$property->slug)}}">
         <div class="col-md-6 no-padding"><div class="sec1-img">
           @if($media = $property->getThumbnail())
           <img src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$media->image)}}">
           @endif
         </div>
       </div>
       <div class="col-md-6 no-padding">
         <div class="sec1-det">
          <h2>{{str_limit($property->title,24)}}</h2>
          <p> <i class="avenueicon-placeholder"></i>  {{ str_limit($property->getAddress(),30)}}</p>
          <p>{{$property->bedroom}} Bedroom</p>
          <p>{{$property->bathroom}} Bathroom</p>
        </div>
      </div>
      <div class="col-md-12 no-padding spl">
       
       <div class="pc">{{number_format($property->price)}} {{$property->currency}}</div>
       <div class="link"><i class="avenueicon-external-link"></i></div>
     </div>
   </a>
 </div>

--}}


<div class="col-md-4">
         <a href="{{url('property/'.$property->slug)}}">
          <div class="sec2-img" >
            @if($property->medias->first() != null)
            <img src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}}"  >
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
           <div class="pr-sec2">{{number_format($property->price)}} {{($property->currency != null) ? ($property->currency) : 'QAR'}}</div>
           @endif
         </div>
         <div class="sec2-mdet"><h4>{{str_limit($property->title,38)}}</h4><p> <i class="avenueicon-placeholder"></i> {{ str_limit($property->getAddress(),45)}}</p></div>
       </a>
     </div>


 @endforeach
</div>
@endforeach
@endif

</div>
</div>
</div>
</div>


@endsection

@section('scripts')
@parent

<script type="text/javascript">
  var revapi;
  jQuery(document).ready(function() {
   revapi = jQuery('.tp-banner').revolution(
   {
    delay:9000,
    startwidth:1170,
    startheight:380,
    hideThumbs:10,
    fullWidth:"on",
    forceFullWidth:"on"
  });

 }); 
</script>
@endsection