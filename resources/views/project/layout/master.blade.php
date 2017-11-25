<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Gulf Yachts</title>
    <link rel="icon" href="{{url(config('whyte.project.favicon'))}}" type="image/x-icon">
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
           <li><a href="{{url('boats')}}">Boats</a></li>
           <li><a href="{{url('inventory')}}">Inventory</a></li>
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

  @include('project.layout.partials.search')

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
        startheight:955,
        hideThumbs:10,
        fullWidth:"off",
        fullScreen:"off",
        fullScreenOffsetContainer: ""
      });
  }); 
</script>



@show
@section('scripts')
<script type="text/javascript" src="{{url('project/js/price.js')}}"></script>
<script>
  $(document).ready(function() {
    filterLimits = {};
    filterLimits.min_length = {{$filterLimits['min_length']}};
    filterLimits.max_length = {{$filterLimits['max_length']}};

    filterLimits.min_year = {{$filterLimits['min_year']}};
    filterLimits.max_year = {{$filterLimits['max_year']}};

    filterLimits.min_price = {{$filterLimits['min_price']}};
    filterLimits.max_price = {{$filterLimits['max_price']}};


    $('.noUi-handle').on('click', function() {
      $(this).width();
    });
    var sliderYearModal = document.getElementById('sliderYearModal');
    var moneyFormat = wNumb({
      decimals: 0,
      thousand: ',',
      prefix: ' '
    });
    noUiSlider.create(sliderYearModal, {
      start: [ filterLimits.min_year,  filterLimits.max_year],
      step: 1,
      range: {
        'min': [ filterLimits.min_year],
        'max': [ filterLimits.max_year]
      },at: moneyFormat,
      connect: true
    });
    
    
    sliderYearModal.noUiSlider.on('update', function(values, handle) {
      document.getElementById('sliderYearModal-lower').innerHTML = Math.floor(values[0]);
      document.getElementById('sliderYearModal-upper').innerHTML = Math.ceil(values[1]);
      // document.getElementById('min-year').value =Math.floor(values[0]);
      // document.getElementById('max-year').value = Math.ceil(values[1]);
    }); 




      var sliderPriceModal = document.getElementById('sliderPriceModal');
      var moneyFormat = wNumb({
        decimals: 0,
        thousand: ',',
        prefix: ''
      });
      noUiSlider.create(sliderPriceModal, {
       start: [ filterLimits.min_price,  filterLimits.max_price],
       step: 100,
       range: {
        'min': [ Math.floor( filterLimits.min_price / 100) * 100],
        'max': [ Math.ceil( filterLimits.max_price / 100) * 100]
      },
      format: moneyFormat,
      connect: true
    });
      
      
      sliderPriceModal.noUiSlider.on('update', function(values, handle) {
        document.getElementById('sliderPriceModal-lower').innerHTML = values[0];
        document.getElementById('sliderPriceModal-upper').innerHTML = values[1];
      });


      var sliderLengthModal = document.getElementById('sliderLengthModal');

      noUiSlider.create(sliderLengthModal, {
        start: [filterLimits.min_length, filterLimits.max_length],
        step: 10,
        range: {
          'min': [filterLimits.min_length],
          'max': [filterLimits.max_length]
        },
        connect: true
      });



      sliderLengthModal.noUiSlider.on('update', function(values, handle) {
        document.getElementById('sliderLengthModal-lower').innerHTML = Math.floor(values[0])+"Ft";
        document.getElementById('sliderLengthModal-upper').innerHTML = Math.ceil(values[1])+"Ft";
      });

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
<script src="{{url('project/js/jquery.mapit.js')}}"></script>
<script>
 $(document).ready(function() {
	$('#map_canvas').mapit();
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


@show

</body>
</html>
