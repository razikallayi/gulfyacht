<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Gulf Yachts</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <meta name="theme-color" content="#a8172a">
@section('styles')

<link rel="stylesheet" type="text/css" href="{{url('project/css/bootstrap.min.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('project/css/bootsnav.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('project/css/font-awesome.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('project/css/slider.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('project/css/stylesheet.css')}}" media="all">


<script src="{{url('project/js/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{url('project/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('project/js/modernizr.custom.js')}}" type="text/javascript"></script>

@show

</head>

<body>



@section('header')
<nav class="navbar navbar-default bootsnav navbar-fixed">
    
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


<div class="abt-bg">
    <div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
            
            <img src="{{url('project/video/inner.jpg')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            <div class="tp-caption fullscreenvideo"
              data-x="0"
              data-y="0"
              data-speed="1000"
              data-start="1000"
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
             <video class="video-js vjs-default-skin" preload="none" width="100%" height="100%" poster='{{url('project/video/inner.jpg')}}' data-setup="{}" muted>
            <source src='{{url('project/video/inner.mp4')}}' type='video/mp4' />
            <source src='{{url('project/video/inner.webm')}}' type='video/webm' />
            <source src='{{url('project/video/inner.ogv')}}' type='video/ogg' />
            </video>
            </div>
                        
                        
                        
          </li> 
        </ul>
<div class="tp-bannertimer"></div>  </div>
</div>
</div>


@show

@yield('content')



@section('footer')

<footer class="ftr">
  <div class="container">
    <div class="col-md-12 no-padding">
       <img src="{{url('project/images/ftr-logo.png')}}">
       <div class="ftr-nav">
         <ul>
           <li><a href="{{url('/')}}">Home</a></li>
           <li><a href="{{url('about')}}">About Us</a></li>
           <li><a href="{{url('boats/new')}}">Boats</a></li>
           <li><a href="{{url('boats')}}">Used Boats</a></li>
           <li><a href="{{url('sell')}}">Sell Your Boat</a></li>
           <li><a href="{{url('contact')}}">Contact Us</a></li>
         </ul>
       </div>
       <div class="ftr-social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          </ul>
       </div>
       <p><span>Gulf Yachts Doha</span> © 2017 All rights reserved. <br> Powered By <a href="http://www.whytecreations.com/" target="_blank" rel="dofollow"> Whyte Company</a></p>
    </div>
  </div>
</footer>

@show


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


@section('scripts')
<script src="{{url('project/js/owl.carousel.js')}}"></script>
<script>
$(document).ready(function() {
  $("#owl-demo").owlCarousel({
  autoPlay: 3000,
  items : 6,
  itemsDesktop : [1199,3],
  itemsDesktopSmall : [979,1],
  navigation : false,
  pagination: false,
  });
});
</script>


<script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
  </script>

<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-Token': Laravel.csrfToken
  }
});
</script>

<script src="{{url('project/js/snap.svg-min.js')}}"></script>
<script src="{{url('project/js/classie.js')}}"></script>
<script src="{{url('project/js/dialogFx.js')}}"></script>
<script>
  (function() {

    var dlgtrigger = document.querySelector( '[data-dialog]' ),

      somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
      // svg..
      morphEl = somedialog.querySelector( '.morph-shape' ),
      s = Snap( morphEl.querySelector( 'svg' ) ),
      path = s.select( 'path' ),
      steps = { 
        open : morphEl.getAttribute( 'data-morph-open' ),
        close : morphEl.getAttribute( 'data-morph-close' )
      },
      dlg = new DialogFx( somedialog, {
        onOpenDialog : function( instance ) {
          // animate path
          setTimeout(function() {
            path.stop().animate( { 'path' : steps.open }, 1500, mina.elastic );
          }, 150 );
        },
        onCloseDialog : function( instance ) {
          path.stop().animate( { 'path' : steps.close }, 250, mina.easeout );
        }
      } );

    dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );

  })();
</script>
<script src="{{url('project/js/selectFx.js')}}"></script>
<script>
  (function() {
    [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {  
      new SelectFx(el);
    } );
  })();
</script>

@show


</body>
</html>
