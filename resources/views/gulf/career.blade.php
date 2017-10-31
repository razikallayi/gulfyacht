@extends('gulf.layout.master')

@section('content')

<div class="abt-tp"></div>



<div class="cr clearfix">
  <div class="cr-ttl">
   <div class="container">
    <div class="col-md-12">
      <h2>Interested in <span>Joining Us ?</span></h2> <p>The Pearl is a brand new luxury tower in the Viva Bahriyah development. Prepare to be dazzled by what this magnificently designed tower has to offer. As soon as you arrive, the grand entrance lobby will offer you a breathtaking ocean view alongside some one-of-a-kind water features. At The Pearl, you can combine family oriented beachfront living with spectacular quality and an extraordinary lifestyle.</p>
    </div>
  </div>
</div>



<div class="container">
  <div class="col-md-12 no-padding car">
    <div class="row">
      @if(Session::has('mail_success'))
      <h4>{{Session::get('mail_success')}}</h4>
      @endif
      <form method="post" action="{{url('career_mail')}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="col-md-6">
        <div class="form-group"><span class="fn"></span><input type="text" placeholder="First Name" class="form-control" name="fname" required></div>
       </div>

       <div class="col-md-6">
         <div class="form-group"><span class="fn"></span><input type="text" placeholder="Last Name" class="form-control" name="lname" required></div>
       </div>

       <div class="col-md-6">
         <div class="form-group"><span class="eml"></span><input type="text" placeholder="E mail" class="form-control" name="email" required></div>
       </div>

       <div class="col-md-6">
         <div class="form-group"><span class="phn"></span><input type="text" placeholder="Phone" class="form-control"  name="phone" required></div>
       </div>

       <div class="col-md-6">
         <div class="form-group"><span class="msg"></span><textarea class="form-control" placeholder="Describe in few words most important features of the project "  name="description" required></textarea></div>
       </div>

       <div class="col-md-6">
         <div class="form-group"><div style="position:relative;">
          <a class='btn btn-primary' href='javascript:;'>
           Upload Your CV 
           <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'  required>
         </a>
         &nbsp;
         <span class='label label-info' id="upload-file-info"></span>
       </div></div>


       <div class="form-group"><button class="btn-con" type="submit">Submit Application</button></div>
     </div>

   </form>
 </div>
</div>
</div>

</div>

@include('gulf.layout.partials.featured')

@endsection