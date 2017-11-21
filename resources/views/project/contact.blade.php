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
         <h3>CONTACT US</h3>
       </div>
       
    </div>
  </div>
</div>

<div class="con-sec">
  <div class="container">
     <div class="col-md-12 no-padding">
         <div class="gmap"><div id="map_canvas"></div></div>
        
        <div class="contact clearfix">
          <div class="col-md-12 no-padding">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif


            @if (session()->has('message'))
            <div class="alert {{session()->get('status')}}">
              <ul>
                <li>{!!session()->get('message')!!}</li>
              </ul>
            </div>
            @endif


          <div class="col-md-4 col-lg-3">
            <h4>Contact Details</h4>
            <ul>
              <li><img src="{{url('project/images/map.svg')}}">Palm Tower B, Office 3205  <br> West Bay, P.O BOX 11093 <br> Doha - Qatar </li>
              <li><a href="tel:+974 4414 6643"> <img src="{{url('project/images/phn.svg')}}">  +974 4482 0250</a></li>
              <li><a href="mailto:mail@gulf-yachts.com"> <img src="{{url('project/images/mail.svg')}}">  mail@gulf-yachts.com</a></li>
            </ul>
          </div>
          
          <div class="col-md-8 col-lg-9 no-padding">
            <form action="{{url('contact')}}" method="post">
                          {{csrf_field()}}
             <div class="col-md-6">
              <div class="form-group"><input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name"></div>
              <div class="form-group"><input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="E-Mail"></div>
              <div class="form-group"><input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Phone"></div>
            </div>
            <div class="col-md-6">
              <div class="form-group"><textarea class="form-control" name="message" placeholder="Message">{{old('message')}}</textarea></div>
            </div>
            <div class="col-md-12"><button class="butn">SEND</button></div>
            </form>
          </div>
          
          </div>
          
          <div class="col-md-12 no-padding cr-sec">
             <div class="col-md-6">
               <div class="cr">
                <form action="{{url('career')}}" method="post"  enctype="multipart/form-data">
                              {{csrf_field()}}
                 <div class="form-group"><input type="text" class="form-control" name="name" placeholder="Name"></div>
                 <div class="form-group"><input type="email" class="form-control" name="email" placeholder="E-Mail"></div>
                 <div class="form-group"><input type="text" class="form-control" name="phone" placeholder="Phone"></div>
                 <div class="form-group"><span id="filename">Select your file</span><label for="file-upload"><img src="{{url('project/images/attach.png')}}"><input type="file" id="file-upload" name="file" class="form-control"></label></div>
                 <input type="hidden" name="message" value=""/>
                 <div class="form-group"><button class="butn">SUBMIT</button></div>
               </form>
               </div>
             </div>
             <div class="col-md-6">
               <h3>Send Your Resume</h3>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
             </div>
          </div>
          
        </div>
        
     </div>
  </div>
</div>        
        
@endsection