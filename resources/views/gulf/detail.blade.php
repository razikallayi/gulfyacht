@extends('gulf.layout.master')
@section('content')


<div class="abt-tp"></div>
@section('searchtype','serch-bxbt')
@include('gulf.layout.partials.search')
@if($property==null)
<div class="col-md-12" style="margin:100px 0 100px 0">
  <h3 align="center">Property doesnot exist!</h3>
</div>
@else



<div class="det-slider">
{{-- @if(Session::get('send_success'))
<h4 >{{Session::has('send_success')}}</h4>
@endif --}}
<div class="container">
  <div class="col-md-12 no-padding">
    <div class="row">
     <div class="col-md-9">
      <h1>{{$property->title}}</h1>
      <p> <i class="avenueicon-placeholder"></i> {{$property->getAddress()}} <span style="color:black;float: right;padding-right: 18px;">REFERENCE : @if($property->reference_id){{$property->reference_id}}@else {{'0'}}@endif </span></p>
      
     {{--  <p style="color: black;">REFERENCE NUMBER : <span style="color:black;">@if($property->reference_id){{$property->reference_id}}@else {{'0'}}@endif</span></p> --}}{{-- <p ></p> --}}

    </div>
    <div class="col-md-3">

      <div class="pnt"><a onClick="printDiv('classone');return false;"> <img src="{{url('gulf/images/pnt.png')}}"> Print </a></div>
      {{-- <div class="share"><a href="#"> <img src="{{url('gulf/images/share.png')}}">  Share </a></div> --}}

      <div class="share"><a href="mailto:?subject=Sharing From Gulf Avenue &amp;body=Check out this site http://whytecreations.in/web/gulf/public ."
        title="Share by Email"> <img src="{{url('gulf/images/share.png')}}">  Share </a></div>


     {{--  <a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://www.website.com."
      title="Share by Email">
      <img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png">
    </a>
    --}}
  </div>
</div>
<div id="classone">
 <div class="inner-slider clearfix">
  <div id="slider">
    <div class="slider-inner">
      <ul>
        @foreach($property->medias as $media)
        <li><a class="ns-img" href="{{url(App\Models\Property::IMAGE_LOCATION.'/'.@$media->image)}}"></a></li>
        @endforeach

      </ul>
      <div class="fs-icon" title="Expand/Close"></div>
    </div>

  </div>

  <div id="thumbnail-slider">
    <div class="inner">
      <ul>
       @foreach($property->medias as $media)
       <li><a class="thumb" href="{{url(App\Models\Property::IMAGE_LOCATION.'/'.@$media->image)}}"></a></li>
       @endforeach


     </ul>
   </div>
 </div>

 <div class="det-pri clearfix">
   <div class="col-md-6"><h4><span>{{number_format($property->price)}}</span> {{$property->currency}} {{$property->category_id==1?$property->rental_period:""}}</h4></div>
   <div class="col-md-6">
     <div class="mn"> 


       <div class="show"><a href="" data-toggle="modal" data-target="#emailpopup-1">E mail Now</a></div>{{-- <div class="slidingDiv"> <a href="mailto:{{$property->email}}"> {{$property->email}}</a></div> --}}

     </div>
     <div class="cn"> <div class="show_hide">Call Now</div><div class="slidingDiv">@if($property->contact_number) {{$property->contact_number}} @else {{ '+974 4482 0250'}} @endif</div></div>
   </div>
 </div>

</div>



<div id="emailpopup-1" class="modal fade" role="dialog" style="z-index:2000">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>


        <div class="row">

          <form id="emailpop"  method="post" action="{{url('sendmail')}}" enctype="multipart/form-data">

            {{csrf_field()}}

            <div class="col-md-6">
              <div class="form-group">


                <img class="img-fluid" style="height:150px" src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.@$media->image)}}" alt="image-property">
                {{--  <input type="hidden" name="image_name" value="{{$media->first()->image}}"> --}}

              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
               <h4>{{$property->title}}</h4><input type="hidden" name="title" value="{{$property->title}}">
               <h4>{{number_format($property->price)}} {{$property->currency}}</h4><input type="hidden" name="price" value="{{$property->price}}">
             </div>
           </div>

           <div class="col-md-12">
            <div class="form-group">
             <span class="msg"></span>
             <textarea class="form-control" placeholder="Describe in few words most important features of the project" required name="message" required></textarea>
           </div>
         </div>


         <div class="col-md-12">
           <div class="form-group">
             <span class="fn"></span>
             <input type="text" class="form-control" placeholder="First Name" name="fname" required>
           </div>
         </div>

         <div class="col-md-12">
           <div class="form-group">
             <span class="eml"></span>
             <input type="text" class="form-control " placeholder="E mail" required name="email">
           </div>
         </div>

         <div class="col-md-12">
           <div class="form-group">
             <span class="phn"></span>
             <input type="text" class="form-control " placeholder="Phone" required name="phone">
           </div>
         </div>

         <div class="col-md-6">
           <div class="form-group">
            <button class="btn-con" type="submit">SEND</button>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>

</div>
</div>




<div class="deta clearfix">
 <div class="col-md-12 no-padding">
   <div class="deta-d clearfix">
    {{-- @if(!$property->amenties) --}}
    <div class="col-md-6 no-padding fa">
   {{--  @else
    <div class="col-md-6 no-padding ">
    @endif --}}
     <h4>FACTS</h4>
     <ul>
       <li><span>Reference</span><span>:</span><span>@if($property->reference_id){{$property->reference_id}}@else{{'0'}}@endif</span></li>
       <li><span>Price</span><span>:</span><span> {{number_format($property->price)}} {{$property->currency}} {{$property->category_id==1?$property->rental_period:""}}</span></li>
       <li><span>Type</span><span>:</span><span>{{$property->type->name}}</span></li>

       <li><span>Bedrooms</span><span>:</span><span>{{$property->bedroom==-1?" Studio":$property->bedroom}}</span></li>
       <li><span> Bathrooms</span><span>:</span><span>{{$property->bathroom}}</span></li>
       <li><span>Area</span><span>:</span><span>{{$property->area}} sqm</span></li>
     </ul>
   </div>
  
   @if($property->amenties)

   <div class="col-md-6 no-padding am">
     <h4>AMENITIES</h4>
     <div class="row">
   {{--   {{dd($property->amenties->first())}} --}}
   @foreach ($property->amenties as $chunk)

     {{--  @foreach ($property->amenties->chunk($property->amenties->count()/2 ) as $chunk) --}}
      <div class="col-md-6">
       <ul>
      
      {{--   @foreach($chunk as $amenty)
    --}}
        @if($chunk)
        <li>{{$chunk->name }}</li>
        @endif
        {{-- @endforeach --}}
      </ul>
    </div>
    @endforeach
   
  </div>
</div>
@endif

</div>

<div class="deta-dec">
 <p style="text-align: justify;">{!!nl2br(e($property->description))!!}</p>
</div>
@if($property->latitude!=null && $property->longitude!=null)
<div class="deta-map">
 <div id="map"></div>
</div>
@endif
</div>
</div>

</div>

</div>
</div>
</div>
@endif


@include('gulf.layout.partials.featured')

@endsection

@section('scripts')
@parent



<script>
  $(function(){ 

    $(".slidingDiv").hide();

    $('.show_hide').click(function( e ){
        var SH = this.SH^=1; // "Simple toggler"
        $(this).text(SH?'':'Show')
        .css({backgroundPosition:'0 '+ (SH?-18:0) +'px'})
        .next(".slidingDiv").slideToggle();
      });

  });

</script>

<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    w=window.open();
    // $("#emailpop").css("display","none");
    $("#emailpop").css("display","none");
    w.document.write(printContents);
   //window.print();
   w.print();
   w.close();
 }
</script>
<style>
 #map {
  height: 100%;
  width: 100%;
}
h1{
  margin-top: 0px;
}
</style>

@if($property->latitude!=null && $property->longitude!=null)
<script>
  function initMap() {
    var location = {lat: {{$property->latitude}}, lng: {{$property->longitude}} };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: location,
      fullscreenControl: true
    });

    var infoContent="<h4>{{$property->title}}</h4><h6>{{$property->getAddress()}}</h6><h6>{{$property->contact_number}}<h6>{{$property->email}}</h6>";
    var infowindow = new google.maps.InfoWindow({
      content:infoContent
    });

    var marker = new google.maps.Marker({
      position: location,
      animation: google.maps.Animation.DROP,
      map: map
    });
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjDU4IVRI-4FJ7PN6ZdyiFoN5aS91Moso&callback=initMap">
</script>
@endif
@endsection

@section('styles')
@parent
<style type="text/css">
  @media print {
    body {
      font-family: Georgia, serif;
      background: none;
      color: black;
    }
    #page {
      width: 100%;
      margin: 0; padding: 0;
      background: none;
    }
/*#emailpop 
    {
        display: none !important;
      }*/
      #header, #menu-bar, #sidebar, h2#postcomment, form#commentform, #footer ,#emailpopup-1 , form#emailpop{
        display: none !important;
      }
      .entry a:after {
        content: " [" attr(href) "] ";
      }
      #printed-article {
        border: 1px solid #666;
        padding: 0px;
      }
    }
  </style>
  @endsection
