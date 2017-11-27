@extends('project.layout.master')

@section('content')

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
    <div class="tp-bannertimer"></div>	</div>
  </div>
</div>

<div class="abt ">
  <div class="container">
    <div class="col-md-12 no-padding">
       <div class="abt-tp con">
         <h3>{{@$boat->type->name}} BOAT DETAIL PAGE</h3>
       </div>
       
    </div>
  </div>
</div>


<div class="buy-sec">
   <div class="container">
     
      <div class="col-md-12 no-padding">
        <div class="row">
           <div class="col-md-3 no-padding">
        <div class="fby deta clearfix">
        
        <div class="sbbs">
          <h2>SELL / BUY BOATS ?</h2>
          <ul>
            <li><a href="tel:+974 5581 3565"> <img src="{{url('project/images/phn.png')}}"> +974 5581 3565</a></li>
            <li><a href="mailto:mail@gulf-yachts.com"> <img src="{{url('project/images/mail.png')}}"> mail@gulf-yachts.com</a></li>
          </ul>
          
          <div class="bs"><a href="{{url('brands')}}">BUY</a></div>
          <div class="bs"><a href="{{url('sell')}}">SELL</a></div>
          <div class="sbbs-img"><img src="{{url('project/images/sbbs.png')}}"></div>
        </div>
        </div>
        </div>
        
        <div class="col-md-9">
         <div class="det">
         
         <section class="det-slider">
        <div id="slider" class="flexslider">
          <ul class="slides">
            @foreach($boat->images as $image)
            <li><img src="{{$boat->imageUrl($image->file_name)}}" class="img-responsive" /></li>
            @endforeach

          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides round">
            @foreach($boat->images as $image)
            <li><img src="{{$boat->imageUrl($image->file_name)}}" class="img-responsive" /></li>
            @endforeach
           
          </ul>
        </div>
        <div class="pm">
           <div class="pm-sec"><a href="#" data-toggle="modal" data-target="#myModal"><img src="{{url('project/images/phn.png')}}"></a></div>
           <div class="pm-sec"><a href="mailto:{{$boat->email}}"><img src="{{url('project/images/mail.png')}}"></a></div>

           <div class="modal fade modal-phn" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Contact Number</h4>
                </div>
                <div class="modal-body">
                  <p><a href="tel:{{$boat->phone}}">{{$boat->phone}}</a></p>
                </div>

              </div>
            </div>
          </div>

        </div>
      </section>
         
           <h2>{{$boat->title}}</h2>
           <ul>
              <li><span>Price: </span><span class="orange-color">{{$boat->price}} {{$boat->currency}} </span></li>
              <li><span>Location:</span><span>{{$boat->location}} </span></li>
              <li><span>Year:</span><span>{{$boat->year}}</span></li>
              <li><span>Length (M/F):	</span><span>{{$boat->length}}</span></li>
              <li><span>Condition:</span><span>{{$boat->condition}}</span></li>
           </ul>
           <h4>Description</h4>
           <p>{{$boat->description}}</p>
<h4>Specification</h4>
<ul>
              <li><span>Length Overall:</span><span>{{$boat->length_overall}}</span></li>
              <li><span>Beam: </span><span>{{$boat->beam}} </span></li>
              <li><span>Draft: </span><span>{{$boat->draft}}</span></li>
              <li><span>Engine: </span><span>{{$boat->engine}}</span></li>
              <li><span>Power: </span><span>{{$boat->power}}</span></li>
              <li><span>Engine Hours:  </span><span>{{$boat->engine_hours}}</span></li>
              <li><span>Fuel:  </span><span>{{$boat->fuel}}</span></li>
              <li><span>Max Speed:  </span><span>{{$boat->max_speed}}</span></li>
              <li><span>Cruising Speed: </span><span>{{$boat->cruising_speed}}</span></li>
           </ul>

<h4>Accommodation</h4>
<ul>
              <li><span>Number of cabins:</span><span>{{$boat->no_of_cabins}} </span></li>
              <li><span>Number of berths:  </span><span>{{$boat->no_of_berths}} </span></li>
              <li><span>Number of heads:</span><span>{{$boat->no_of_heads}}</span></li>
              <li><span>Crew : </span><span>{{$boat->crew}}</span></li>
           </ul>

         </div>
        </div>
        
      </div>
   </div>
</div>        
        
@endsection

@section('scripts')
@parent
<script type="text/javascript" src="{{url('project/js/price.js')}}"></script>
<script defer src="{{url('project/js/jquery.flexslider.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 90,
        itemMargin: 10,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        smoothHeight:true,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

@endsection
