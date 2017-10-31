@extends('project.layout.master')

@section('content')

<div class="abt-bg">
    <div class="tp-banner-container">
		<div class="tp-banner" >
        <ul>
        <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
            
						<img src="video/inner.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
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
						 <video class="video-js vjs-default-skin" preload="none" width="100%" height="100%" poster='video/inner.jpg' data-setup="{}" muted>
						<source src='video/inner.mp4' type='video/mp4' />
						<source src='video/inner.webm' type='video/webm' />
						<source src='video/inner.ogv' type='video/ogg' />
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
         <h3>BUY BOAT DETAIL PAGE</h3>
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
            <li><a href="tel:+974 5581 3565"> <img src="images/phn.png"> +974 5581 3565</a></li>
            <li><a href="mailto:ec@gulf-yachts.com"> <img src="images/mail.png"> ec@gulf-yachts.com</a></li>
          </ul>
          
          <div class="bs"><a href="#">BUY</a></div>
          <div class="bs"><a href="#">SELL</a></div>
          <div class="sbbs-img"><img src="images/sbbs.png"></div>
        </div>
        </div>
        </div>
        
        <div class="col-md-9">
         <div class="det">
         
         <section class="det-slider">
        <div id="slider" class="flexslider">
          <ul class="slides">
            <li><img src="images/ever1.jpg" class="img-responsive" /></li>
            <li><img src="images/ever2.jpg" class="img-responsive" /></li>
            <li><img src="images/ever3.jpg" class="img-responsive" /></li>
            <li><img src="images/ever4.jpg" class="img-responsive" /></li>
            <li><img src="images/ever1.jpg" class="img-responsive" /></li>
            <li><img src="images/ever2.jpg" class="img-responsive" /></li>
            <li><img src="images/ever3.jpg" class="img-responsive" /></li>
          </ul>
        </div>
        <div id="carousel" class="flexslider">
          <ul class="slides round">
            <li><img src="images/ever1.jpg" /></li>
            <li><img src="images/ever2.jpg" /></li>
            <li><img src="images/ever3.jpg" /></li>
            <li><img src="images/ever4.jpg" /></li>
            <li><img src="images/ever1.jpg" /></li>
            <li><img src="images/ever2.jpg" /></li>
            <li><img src="images/ever3.jpg" /></li>
          </ul>
        </div>
        <div class="pm">
           <div class="pm-sec"><a href="#" data-toggle="modal" data-target="#myModal"><img src="images/phn.png"></a></div>
           <div class="pm-sec"><a href="mailto:ec@gulf-yachts.com"><img src="images/mail.png"></a></div>
        </div>
      </section>
         
           <h2>Everglades-Everglades 350 EX Power (2014)</h2>
           <ul>
              <li><span>Price: </span><span class="orange-color">535,000 QAR </span></li>
              <li><span>Location:</span><span>Qatar </span></li>
              <li><span>Year:</span><span>2017</span></li>
              <li><span>Length (M/F):	</span><span>1/1</span></li>
              <li><span>Condition:</span><span>Brand New</span></li>
           </ul>
           <h4>Description</h4>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>
<h4>Specification</h4>
<ul>
              <li><span>Length Overall:</span><span> </span></li>
              <li><span>Beam: </span><span> </span></li>
              <li><span>Draft: </span><span></span></li>
              <li><span>Engine: </span><span></span></li>
              <li><span>Power: </span><span></span></li>
              <li><span>Engine Hours:  </span><span></span></li>
              <li><span>Fuel:  </span><span></span></li>
              <li><span>Max Speed:  </span><span></span></li>
              <li><span>Cruising Speed: </span><span></span></li>
           </ul>

<h4>Accommodation</h4>
<ul>
              <li><span>Number of cabins:</span><span> </span></li>
              <li><span>Number of berths:  </span><span> </span></li>
              <li><span>Number of heads:</span><span></span></li>
              <li><span>Crew : </span><span></span></li>
           </ul>

         </div>
        </div>
        
      </div>
   </div>
</div>        
        
@endsection