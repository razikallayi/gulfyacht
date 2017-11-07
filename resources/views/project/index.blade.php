@extends('project.layout.master')


@section('header','')
@section('footer','')

@section('content')
<div class="wrapper">
<div class="slider">

<div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
            
            <img src="{{url('project/images/slider/video.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            <div class="tp-caption fullscreenvideo"
              data-x="0"
              data-y="0"
              data-speed="1000"
              data-start="1100"
              data-easing="Power4.easeOut"
              data-endspeed="1500"
              data-endeasing="Power4.easeIn"
              data-autoplay="true"
              data-autoplayonlyfirsttime="false"
              data-nextslideatend="true"
              data-forceCover="1"
              data-aspectratio="16:9"
              data-forcerewind="on"
                            data-muted="true"
              style="z-index: 2">
             <video class="video-js vjs-default-skin" preload="none" width="100%" height="100%" poster='{{url('project/images/slider/video.jpg')}}' data-setup="{}" muted>
            <source src='{{url('project/images/slider/video.mp4')}}' type='video/mp4' />
            <source src='{{url('project/images/slider/video.webm')}}' type='video/webm' />
            <source src='{{url('project/images/slider/video.ogv')}}' type='video/ogg' />
            </video>
            </div>
                        
                        
                        
          </li> 
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="" data-delay="8000"  data-saveperformance="off"  data-title="">
                <img src="{{url('project/images/slider/slider2.jpg')}}" alt=""  data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center"  >
            </li>
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="" data-delay="8000"  data-saveperformance="off"  data-title="">
                <img src="{{url('project/images/slider/slider3.jpg')}}" alt=""  data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center"  >
            </li>
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="" data-delay="8000"  data-saveperformance="off"  data-title="">
                <img src="{{url('project/images/slider/slider4.jpg')}}" alt=""  data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center"  >
            </li>
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="" data-delay="8000"  data-saveperformance="off"  data-title="">
                <img src="{{url('project/images/slider/slider1.jpg')}}" alt=""  data-bgposition="left center" data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="130" data-bgpositionend="right center"  >
            </li>
        </ul>
<div class="tp-bannertimer"></div>  </div>
</div>
  


</div>
<div class="main-sec">
<nav class="navbar navbar-default bootsnav">
    @include('project.layout.partials.navigation')
</nav>


<div class="brand">
  <div class="container">
    <div class="col-md-12 no-padding">
      
      <div class="band-sec">
        <div id="owl-demo" class="owl-carousel">
@foreach($brands as $brand)
          <div class="item">
            <span class="tooltip tooltip-effect-1">
              <span class="tooltip-item"><a href="{{$brand->detailPageUrl()}}"  target="_blank"><img src="{{$brand->imageUrl()}}"></a></span>
              <span class="tooltip-content clearfix">
                <span class="tooltip-text">
                  @foreach($brand->products->take(2) as $product)
                  <a href="{{$product->detailPageUrl()}}" target="_blank"><img src="{{$product->imageUrl()}}" class="img-responsive"><p>{{$product->name}}</p></a>
                  @endforeach
                </span>
              </span>
            </span>
          </div>
@endforeach
            
        
        </div>
      </div>
      
      <div class="col-md-12 no-padding">
        <div class="ftr-left">© 2017 GULF YATCH . All Rights Reserved.</div>
        <div class="ftr-right">Powered by <a href="http://www.whytecreations.com/" rel="dofollow" target="_blank"> Whytecreations </a></div>
      </div>
      
    </div>
  </div>
</div>

</div>

</div>
@endsection

@section('banner-script')
<script src="{{url('project/js/bootsnav.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('project/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{url('project/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript">
  var revapi;
  jQuery(document).ready(function() {
       revapi = jQuery('.tp-banner').revolution(
      {
        delay:15000,
        startwidth:1170,
        startheight:500,
        hideThumbs:10,
        fullWidth:"off",
        fullScreen:"on",
        fullScreenOffsetContainer: ""
      });
  }); 
</script>
@endsection

@section('scripts')
@parent
<script src="{{url('project/js/owl.carousel.js')}}"></script>
<script>
$(document).ready(function() {
  owlcarrousal = $("#owl-demo").owlCarousel({
  autoPlay: 3000,
  items : 6,
  itemsDesktop : [1199,3],
  itemsDesktopSmall : [979,1],
  navigation : false,
  pagination: false,
  });
  $( ".owl-prev").html('');
  $( ".owl-next").html('');
});
</script>
@endsection
