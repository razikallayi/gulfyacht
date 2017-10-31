@extends('gulf.layout.master')

@section('content')

<div class="abt-tp"></div>
 <!--
<div class="jny-sec">
   <div class="container">
      <div class="col-md-12 no-padding">
        <h2>Our Journey</h2>
   		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
        
         <div class="mile-stone clearfix">
            <ul>
              <li><h3>2000</h3><div class="dot"></div><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
              <li><h3>2005</h3><div class="dot"></div><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
              <li><h3>2010</h3><div class="dot"></div><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
              <li><h3>2015</h3><div class="dot"></div><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
            </ul>
         </div>
        
      </div>
   </div>
</div>
-->
<div class="abt-sec">
  <div class="container">
     <div class="col-md-12 no-padding">
        <div class="asec-tittle">
         <h2>Who We Are ?</h2>
         <p></p>
         </div>
         
         <div class="row">
         <div class="col-md-12 no-padding">
           <div class="col-md-6">
             <p> Gulf Avenues Real Estate is boutique real estate agency founded in 2010, is one of the leading real estate companies in Qatar. With our unique contemporary style and total passion for connecting people with property, we aspire to provide the ultimate real estate experience for our customers. </p>
           </div>
           
           <div class="col-md-6">
             <p> 
With our long experience in international market and focused team in local market, we apply high quality standards to ensure smooth and transparent property transactions. We are not confined by traditional real estate boundaries when it comes to buying, selling and renting instead we are always finding new and innovative ways to satisfy our clients’ needs.
 </p>
           </div>
           
           </div>
           <!--
           <div class="col-md-12 no-padding">
           
           <div class="col-md-6">
             <div class="mv">
                <div class="mv-img"><img src="{{url('gulf/images/m.png')}}"></div>
                 <h4>Mission</h4>
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
             </div>
           </div>
           
           <div class="col-md-6">
             <div class="mv">
                <div class="mv-img"><img src="{{url('gulf/images/v.png')}}"></div>
                 <h4>Vision</h4>
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
             </div>
           </div>
           
           </div>
           -->
           <div class="col-md-12">
             <p class="text-last-centered"> We strive to meet and exceed the expectations of our clients in providing them with the most up-to-date knowledge and high-quality service for end users and investors. We have strong partnership with developers as well as vast listing of properties that meet different needs. We provide leasing, sales and soon property management services at a very high standard. Our management and sales team have a very thorough knowledge of the Qatar real estate market and international market, that include London, Paris, Cannes and New York. </p>
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
    var activeNav = 'about';
    $(".navbar-menu ul li").removeClass('active');
    $(".navbar-menu ul li").each(function(){    
      if($(this).attr("class") == activeNav){
        $(this).addClass('active');
      }
    });
  });
</script>
@endsection