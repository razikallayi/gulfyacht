<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Gulf Avenue</title>
    <link rel="icon" href="http://gulfavenues.com/md/favicon.ico" type="image/x-icon">
    <meta name="theme-color" content="#a8172a">
@section('styles')

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{url('gulf/css/bootstrap.min.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('gulf/css/bootsnav.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('gulf/css/settings.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('gulf/css/stylesheet.css')}}" media="all">

<script src="{{url('gulf/js/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{url('gulf/js/bootstrap.min.js')}}" type="text/javascript"></script>

@show

</head>

<body>
  <header class="cd-auto-hide-header">
   <div class="page-header">
     <div class="container">
      <div class="col-md-12 no-padding">
        <div class="mlft"><a href="mailto:info@gulfavenues.com"><i class="avenueicon-mail"></i> info@gulfavenues.com</a></div>
        <div class="srgt"><a href="javascript:void(0)"><i class="avenueicon-facebook-logo"></i></a> <a href="javascript:void(0)"><i class="avenueicon-twitter-logo-silhouette"></i></a> <a href="javascript:void(0)"><i class="avenueicon-instagram"></i></a> <a href="javascript:void(0)"><i class="avenueicon-google-plus-symbol"></i></a></div>
        <div class="lan"> <a href="javascript:void(0)"> Arabic </a> </div>
      </div>
    </div>
  </div>
  
  <nav class="navbar navbar-default bootsnav">
    <div class="container">  
      
      <div class="attr-nav">
        <ul>
          <li><a href="javascript:void(0)"><i class="avenueicon-technology"></i> +974 4482 0250</a></li>
        </ul>
      </div>        

      
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menu">
          <i class="glyphicon glyphicon-menu-hamburger"></i>
        </button>
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('gulf/images/logo.png')}}" class="logo" alt=""></a>
      </div>

      <div class="collapse navbar-collapse nav-effect navbar-menu">
        <ul class="nav navbar-nav navbar-right">
          <li class="rent"><a href="{{url('rent')}}">Rent</a></li>                    
          <li class="buy"><a href="{{url('buy')}}">Buy</a></li>
          <li class="international"><a href="{{url('international')}}">International</a></li>
          <li class="about"><a href="{{url('about')}}">About Us</a></li>
          <li class="contact"><a href="{{url('contact')}}">Contact Us</a></li>
        </ul>
      </div>

    </div>   
  </nav>
</header>


@yield('content')


<footer>
  <div class="container">
     <div class="col-md-12">
        <div class="row">
           <div class="col-md-5 no-padding clearfix">
              <div class="ml">
                <h4> <img src="{{url('gulf/images/ftr-arw.png')}}"> MAIN LINKS</h4>
                 <ul>
                    <li><a href="{{url('career')}}">Careers</a></li>
                    <li><a href="{{url('events')}}">News & Events</a></li>
                    <li><a href="{{url('faq')}}">FAQs</a></li>
                    <li><a href="{{url('terms')}}">Terms & Conditions</a></li>
                    <li><a href="{{url('about')}}">About Us</a></li>
                    <li><a href="{{url('contact')}}">Contact Us</a></li>
                 </ul>
              </div>
           </div>
           
           <div class="col-md-4 no-padding clearfix">
            <div class="ml sn">
              <h4> <img src="{{url('gulf/images/ftr-arw.png')}}"> <span>SUBSCRIBE</span> NEWSLETTER </h4>
              <form id="Subscribe" name="Subscribe">
              <div class="input-group input-group-lg">
                <input type="email" id="subcribe_email" name="subscriber_email" class="form-control newsletter" required placeholder="Enter email" aria-describedby="sizing-addon1" style="color: #fff;">
                <span onclick="subscribe()" class="input-group-addon" style="cursor: pointer;"  id="sizing-addon1"><img src="{{url('gulf/images/sub.png')}}"></span>
              </div>
            </form>

              {{--<p>Lorem Ipsum is simply dummy text of
                the printing and typesetting</p>--}}

              </div>
            </div>

           <div class="col-md-3 no-padding clearfix">
              <div class="cs">
                <h4> <img src="{{url('gulf/images/ftr-arw.png')}}"> <span>CONNECT</span>  WITH US </h4>
                
                <div class="ftr-social">
                   <ul>
                     <li><a href="javascript:void(0)"><i class="avenueicon-facebook-logo"></i></a></li>
                     <li><a href="javascript:void(0)"><i class="avenueicon-twitter-logo-silhouette"></i></a></li>
                     <li><a href="javascript:void(0)"><i class="avenueicon-instagram"></i></a></li>
                     <li><a href="javascript:void(0)"><i class="avenueicon-google-plus-symbol"></i></a></li>
                   </ul>
                </div>

                <img src="{{url('gulf/images/GA_logo.png')}}" style="width: 207px;">
              </div>
           </div>
           
        </div>
     </div>
  </div>
</footer>

<div class="ftr-btm">
  <div class="container">
     <div class="col-md-12 no-padding">
        <div class="ftr-lft">© 2016 GULF AVENUE . All Rights Reserved.</div>
        
        <div class="ftr-rgt">Powered by <a href="http://whytecreations.com/" target="_blank" rel="dofollow"> Whyte Company</a></div>
     </div>
  </div>
</div>


<div id="Popup" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p class="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@section('scripts')
<script src="{{url('gulf/js/bootsnav.js')}}" type="text/javascript"></script>
<script>
  $.fn.responsiveTabs = function () {
    return this.each(function () {
        var el = $(this), tabs = el.find('dt'), content = el.find('dd'), placeholder = $('<div class="responsive-tabs-placeholder"></div>').insertAfter(el);
        tabs.on('click', function () {
            var tab = $(this);
            tabs.not(tab).removeClass('active');
            tab.addClass('active');
            placeholder.html(tab.next().html());
        });
        tabs.filter(':first').trigger('click');
    });
};
$('.responsive-tabs').responsiveTabs();
</script>

<script type="text/javascript" src="{{url('gulf/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{url('gulf/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{url('gulf/js/slider.js')}}" type="text/javascript"></script>

<script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
  </script>

{{-- <script src="{{url('gulf/js/index.js')}}"></script>
 --}}
<script src="{{url('gulf/js/jquery.nice-select.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('select:not(.ignore)').niceSelect();      
});    
</script>

<script type="text/javascript">

  function subscribe(){
    var email = $('input[name=subscriber_email]').val();
    if(validateEmail(email)){
      $('#Subscribe').submit();
    }else{
      popup('<div class="alert"><ul>Please enter valid email!</ul></div>')
    }
  }

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function popup(message){
    $('#Popup .message').html(message);
    $('#Popup').modal();
  }
  
  $(function(){
    $('#Subscribe').submit(function(event) {
      event.preventDefault();
      var formData = {
        'email'      : $('input[name=subscriber_email]').val()
      };
      var message;
      $.ajax({
        type        : 'POST',
        url         : '{{url('subscribe')}}',
        data        :  formData, 
        dataType    : 'json', // what type of data do we expect back from the server
        encode          : true,
        success: function(data){
          if(data.status=="success"){
            message= "Thank you for subscribing! You will be notified when we publish news & events.";
          }
          else{
            message= "Sorry! Couldnot subscribe.";
          }
        },
        error: function(data){
          if(data.status == 422){
            var errors = data.responseJSON;
            errorsHtml="";
            $.each( errors , function( key, value ) {
              errorsHtml += '<li>' + value[0] + '</li>';
            });
            message = errorsHtml;
          }else{
            message = "Failed! Couldnot subscribe.";
          }
        },
        complete: function(){
          popup('<div class="alert"><ul>'+message+"</ul></div>");
          document.getElementById("Subscribe").reset();
        }
      })
    });
  });
</script>

<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-Token': Laravel.csrfToken
  }
});
</script>

<script type="text/javascript">
// var email = document.getElementById('subcribe_email').value;
// //alert(email);
//   subscriber_email.check(email, function(error, response){
//     console.log('res: '+response);
//   });
</script>
@show


</body>
</html>
