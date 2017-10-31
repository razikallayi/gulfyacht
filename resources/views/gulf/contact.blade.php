@extends('gulf.layout.master')
@section('content')

<div class="abt-tp"></div>

<div class="con-sec">
<div class="gmap-img"></div>
  <div class="container">
     <div class="col-md-12 no-padding">
        <h2>Get in Touch With Us</h2>
        @if(Session::has('mail_success'))
        <h4>{{Session::get('mail_success')}}</h4>
        @endif
        <div class="row">
           <div class="col-md-6">
              <form  method="post" action="{{url('contact_us')}}" enctype="multipart/form-data">

                {{csrf_field()}}

                 <div class="form-group">
                   <span class="fn"></span>
                    <input type="text" class="form-control" placeholder="First Name" name="fname" required>
                 </div>
                 <div class="form-group">
                 <span class="eml"></span>
                    <input type="text" class="form-control " placeholder="E mail" required name="email">
                 </div>
                 <div class="form-group">
                 <span class="phn"></span>
                    <input type="text" class="form-control " placeholder="Phone" required name="phone">
                 </div>
                 <div class="form-group">
                 <span class="msg"></span>
                    <textarea class="form-control" placeholder="Describe in few words most important features of the project" required name="message"></textarea>
                 </div>
                 <div class="form-group">
                 	<button class="btn-con" type="submit">SEND</button>
                 </div>
              </form>
           </div>
           
           <div class="col-md-6" style="background-color: #F0F0F0 ;">
             <div class="ca">
              <h3>Contact Address</h3>
              <ul>


                <li> <img src="{{url('gulf/images/map.png')}}"> Palm Tower B, Office  3205  <br>West Bay, P.O BOX 11093 <br> Doha - Qatar</li>
                <li><a href="mailto:info@gulfavanues.com"> <img src="{{url('gulf/images/email.png')}}"> info@gulfavanues.com</a></li>
                <li> <img src="{{url('gulf/images/phone.png')}}"> +974 4482 0250 {{-- <br> +974 0000 0000 --}}</li>
                <li> <img src="{{url('gulf/images/fax.png')}}">+974 4411 3628 </li>
                
              </ul>
           </div>
           </div>
           
           <div class="col-md-12">
             <div class="gmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14431.425593668762!2d51.55276748757324!3d25.27541569753113!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sqa!4v1488093486854" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
             </div>
           </div>
           
        </div>
     </div>
  </div>

</div>
@include('gulf.layout.partials.featured')

@endsection

@section('scripts')
@parent

<script type="text/javascript">
  $(function() {
    var activeNav = 'contact';
    $(".navbar-menu ul li").removeClass('active');
    $(".navbar-menu ul li").each(function(){    
      if($(this).attr("class") == activeNav){
        $(this).addClass('active');
      }
    });
  });
</script>
@endsection