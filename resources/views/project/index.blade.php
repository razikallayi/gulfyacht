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
             <video class="video-js vjs-default-skin" preload="none" width="100%" height="100%" poster='images/slider/video.jpg' data-setup="{}" muted>
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


<div id="somedialog" class="dialog">
          <div class="dialog__overlay"></div>
          <div class="dialog__content">
            <div class="morph-shape" data-morph-open="M0,33.699V0c0,0,13.458,0,40.125,0C66.793,0,80,0,80,0v33.974v0.103V60c0,0-13.333,0-40,0c-26.667,0-40,0-40,0V33.699" data-morph-close="M0,33.699V0c0,0,13.208,11,39.875,11C66.543,11,80,0,80,0v33.974v0.103v13.111C80,47.188,66.667,60,40,60
  C13.333,60,0,47.062,0,47.062V33.699">
              <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
                <path d="M0,33.699V0c0,0,13.208,11,39.875,11C66.543,11,80,0,80,0v33.974v0.103v13.111C80,47.188,66.667,60,40,60
  C13.333,60,0,47.062,0,47.062V33.699"></path>
              </svg>
            </div>
            <div class="dialog-inner">
              <h2>Boats for Sale</h2>
                             <form>
                               <div class="form-group clearfix">
                                    <div class="col-md-4">
                                        <select class="cs-select cs-skin-border">
                                            <option value="" disabled selected>New / Used</option>
                                            <option value="">New</option>
                                            <option value="">Pre Owned</option>
                                        </select>
                                    </div>
                                 <div class="col-md-4">
                                        <select class="cs-select cs-skin-border">
                                            <option value="" disabled selected>Manufacturer</option>
                                            <option value="">Prestige</option>
                                            <option value="">Everglades</option>
                                            <option value="">jeanneau</option>
                                            <option value="">Bayliner</option>
                                        </select>
                                    </div>
                                 <div class="col-md-4">
                                        <select class="cs-select cs-skin-border">
                                            <option value="" disabled selected>Category</option>
                                            <option value="">Power</option>
                                            <option value="">Sail</option>
                                        </select>
                                    </div>
                               </div>
                               
                               <div class="form-group clearfix">
                                    <div class="col-md-4">
                                        <select class="cs-select cs-skin-border">
                                            <option value="" disabled selected>Length</option>
                                            <option value="">50 Meter</option>
                                            <option value="">80 Meter</option>
                                        </select>
                                    </div>
                                 <div class="col-md-4">
                                    <div class="col-md-12 no-padding">
                                      <h4>Year</h4>
                                        <div id="slider-range"></div>
                                    </div>
                                        <div class="slider-labels">
                                        <div class="col-xs-6 text-left caption no-padding">
                                        From: <span id="slider-range-value1"></span>
                                        </div>
                                        <div class="col-xs-6 text-right caption no-padding">
                                        To: <span id="slider-range-value2"></span>
                                        </div>
                                        </div>   
                                 </div>
                                 <div class="col-md-4">
                                    <div class="col-md-12 no-padding">
                                      <h4>Price</h4>
                                        <div id="slider-range1"></div>
                                    </div>
                                        <div class="slider-labels">
                                        <div class="col-xs-6 text-left caption no-padding">
                                        <span id="slider-range1-value1"></span>
                                        </div>
                                        <div class="col-xs-6 text-right caption no-padding">
                                        <span id="slider-range1-value2"></span>
                                        </div>
                                        </div>   
                                 </div>
                               </div>
                               <div class="form-group clearfix"><button class="sear-btn">SEARCH </button></div>
                             </form>
                            
                            <div><button class="action" data-dialog-close>Close</button></div>
            </div>
          </div>
        </div>
<div class="brand">
  <div class="container">
    <div class="col-md-12 no-padding">
      
      <div class="band-sec">
        <div id="owl-demo" class="owl-carousel">
@foreach($brands as $brand)
          <div class="item">
            <span class="tooltip tooltip-effect-1">
              <span class="tooltip-item"><a href="{{$brand->detailPageUrl()}}"><img src="{{$brand->imageUrl()}}"></a></span>
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
