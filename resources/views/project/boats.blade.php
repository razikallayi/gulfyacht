@extends('project.layout.master')

@section('content')

<div class="abt ">
  <div class="container">
    <div class="col-md-12 no-padding">
     <div class="abt-tp con">
       <h3>{{$page}} BOATS</h3>
     </div>

   </div>
 </div>
</div>


<div class="buy-sec">
 <div class="container">
  @if($page!='buy')
  <div class="col-md-12 no-padding bnds">
    <div id="owl-demo" class="owl-carousel ">
     @foreach($brands as $brand)
     <div class="item"><a href="{{$brand->detailPageUrl()}}"><img src="{{$brand->imageUrl()}}"></a></div>
     @endforeach
   </div>     
 </div>
 @endif

 <div class="col-md-12 no-padding">
<form id="searchForm">
  <div class="row">
   <div class="col-md-4">
    <div id="collapse-menu" class="collapse-container">
     @if($page=='buy')
     <h3>Brands <span class="arrow-r"></span></h3>
     <div>
      <input type="checkbox" class="read-more-state" id="post-2" />
      <ul class="filt read-more-wrap">
        @foreach($brands->take(3) as $brand)
        <li class="filt__item">
          <label class="label--checkbox"><input name="brands[]" value="{{$brand->name}}" type="checkbox" class="checkbox" >{{$brand->name}}</label>
        </li>
        @endforeach
        <div class="read-more-target">
        @foreach($brands->slice(3) as $brand)
         <li class="filt__item">
          <label class="label--checkbox"><input name="brands[]" value="{{$brand->name}}" type="checkbox" class="checkbox" >{{$brand->name}}</label>
        </li>
        @endforeach
        </div>
      </ul>
      <label for="post-2" class="read-more-trigger"></label>  
    </div>
    @endif
</div>

<div class="fby clearfix">
  <div class="col-md-12 no-padding">
    <h4>Filter By Length</h4>
    <div class="slider-labels">
      <div class="col-xs-6 caption no-padding">
        From <span id="sliderLength-lower" class="orange-color"></span>
        <input type="hidden" name="min-length" id="min-length" value="{{$filterLimits['min_length']}}">
      </div>
      <div class="col-xs-6 caption no-padding">
        To <span id="sliderLength-upper" class="orange-color"></span>
        <input type="hidden" name="max-length" id="max-length" value="{{$filterLimits['max_length']}}">
      </div>
    </div>
    <div id="sliderLength"></div>
  </div>

</div>

<div class="fby clearfix">
  <div class="col-md-12 no-padding">
    <h4>Filter By Year</h4>
    <div class="slider-labels">
      <div class="col-xs-6 caption no-padding">
        From <span id="sliderYear-lower" class="orange-color"></span>
        <input type="hidden" name="min-year" id="min-year" value="{{$filterLimits['min_year']}}">
      </div>
      <div class="col-xs-6 caption no-padding">
        To <span id="sliderYear-upper" class="orange-color"></span>
        <input type="hidden" name="max-year" id="max-year" value="{{$filterLimits['max_year']}}">
      </div>
    </div>
    <div id="sliderYear"></div>
  </div>

</div>

<div class="fby fbs clearfix">
  <div class="col-md-12 no-padding">
    <h4>Filter By Price</h4>
    <div class="slider-labels">
      <div class="col-xs-6 caption no-padding">
        QAR <span id="sliderPrice-lower" class="orange-color"></span>
        <input type="hidden" name="min-price" id="min-price" value="{{$filterLimits['min_price']}}">
      </div>
      <div class="col-xs-6 caption no-padding">
        QAR <span id="sliderPrice-upper" class="orange-color"></span>
        <input type="hidden" name="max-price" id="max-price" value="{{$filterLimits['max_price']}}">
      </div>
    </div>
    <div id="sliderPrice"></div>
  </div>
</div>

<div class="sbbs">
  <h2>SELL / BUY BOATS ?</h2>
  <ul>
    <li><a href="tel:+974 5581 3565"> <img src="{{url('project/images/phn.png')}}"> +974 5581 3565</a></li>
    <li><a href="mailto:ec@gulf-yachts.com"> <img src="{{url('project/images/mail.png')}}"> ec@gulf-yachts.com</a></li>
  </ul>
  <div class="bs"><a href="#">BUY</a></div>
  <div class="bs"><a href="#">SELL</a></div>
  <div class="sbbs-img"><img src="{{url('project/images/sbbs.png')}}"></div>
</div>
</div>


<div class="col-md-8">
 <div class="srt">
   <div class="sel sel--black-panther">
    <select name="sort" id="sort">
      <option value="popularity-desc" disabled>Sort By</option>
      <option value="popularity-desc">Popularity</option>
      <option value="price-asc">Price--Low to High</option>
      <option value="price-desc">Price--High to Low</option>
      <option value="new-desc">Newest First</option>
    </select>
  </div>

  {{-- {{ $boats->links('vendor.pagination.project-pagination') }} --}}
</div>
<div class="buy-mn nb">
 <div class="row">
<div id="boatContent">
</div>

  <div class="col-md-12">
    {{-- <div class="btm-pagi">{{ $boats->links('vendor.pagination.project-pagination') }}</div> --}}
  </div>

</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>        

@endsection

@section('scripts')

<script src="{{url('project/js/jquery.collapsible.js')}}"></script> 
<script>
  $('#accordion-menu').collapsible({
    contentOpen: 1,
    accordion: true
  });
  $('#collapse-menu').collapsible({
    contentOpen: 1,
    accordion: true
  });
</script>


<script>
 $('.sel').each(function() {
  $(this).children('select').css('display', 'none');
  
  var $current = $(this);
  
  $(this).find('option').each(function(i) {
    if (i == 0) {
      $current.prepend($('<div>', {
        class: $current.attr('class').replace(/sel/g, 'sel__box')
      }));
      
      var placeholder = $(this).text();
      $current.prepend($('<span>', {
        class: $current.attr('class').replace(/sel/g, 'sel__placeholder'),
        text: placeholder,
        'data-placeholder': placeholder
      }));
      
      return;
    }
    
    $current.children('div').append($('<span>', {
      class: $current.attr('class').replace(/sel/g, 'sel__box__options'),
      text: $(this).text()
    }));
  });
});

 $('.sel').click(function() {
  $(this).toggleClass('active');
});

 $('.sel__box__options').click(function() {
  var txt = $(this).text();
  var index = $(this).index();
  $('#searchForm').submit();
  
  $(this).siblings('.sel__box__options').removeClass('selected');
  $(this).addClass('selected');
  
  var $currentSel = $(this).closest('.sel');
  $currentSel.children('.sel__placeholder').text(txt);
  $currentSel.children('select').prop('selectedIndex', index + 1);
});
</script> 

<script src="{{url('project/js/owl.carousel.js')}}"></script>
<script>
  $(document).ready(function() {
    $("#owl-demo").owlCarousel({
      autoPlay: 3000,
      items : 6,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,1],
      navigation : true,
      pagination: false,
    });
    $( ".owl-prev").html('<i class="fa fa-angle-left"></i>');
    $( ".owl-next").html('<i class="fa fa-angle-right  "></i>');
  });
</script>


<script type="text/javascript" src="{{url('project/js/price.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.noUi-handle').on('click', function() {
      $(this).width();
    });
    var sliderLength = document.getElementById('sliderLength');
    var min_length = {{$filterLimits['min_length']}};
    var max_length = {{$filterLimits['max_length']}};

    var min_year = {{$filterLimits['min_year']}};
    var max_year = {{$filterLimits['max_year']}};

    var min_price = {{$filterLimits['min_price']}};
    var max_price = {{$filterLimits['max_price']}};

    noUiSlider.create(sliderLength, {
      start: [min_length, max_length],
      step: 10,
      range: {
        'min': [min_length],
        'max': [max_length]
      },
      connect: true
    });
    
    

    sliderLength.noUiSlider.on('update', function(values, handle) {
      document.getElementById('sliderLength-lower').innerHTML = Math.floor(values[0])+"Ft";
      document.getElementById('sliderLength-upper').innerHTML = Math.ceil(values[1])+"Ft";
      document.getElementById('min-length').value =Math.floor(values[0]);
      document.getElementById('max-length').value = Math.ceil(values[1]);
      
    });

    sliderLength.noUiSlider.on('end', function(values, handle) {
     $('#searchForm').submit();
    });





    $('.noUi-handle').on('click', function() {
      $(this).width();
    });
    var sliderYear = document.getElementById('sliderYear');
    var moneyFormat = wNumb({
      decimals: 0,
      thousand: ',',
      prefix: ' '
    });
    noUiSlider.create(sliderYear, {
      start: [min_year, max_year],
      step: 1,
      range: {
        'min': [min_year],
        'max': [max_year]
      },at: moneyFormat,
      connect: true
    });
    
    
    sliderYear.noUiSlider.on('update', function(values, handle) {
      document.getElementById('sliderYear-lower').innerHTML = Math.floor(values[0]);
      document.getElementById('sliderYear-upper').innerHTML = Math.ceil(values[1]);
      document.getElementById('min-year').value =Math.floor(values[0]);
      document.getElementById('max-year').value = Math.ceil(values[1]);
    });

      sliderYear.noUiSlider.on('end', function(values, handle) {
     $('#searchForm').submit();
    });

 





    $('.noUi-handle').on('click', function() {
      $(this).width();
    });
    var sliderPrice = document.getElementById('sliderPrice');
    var moneyFormat = wNumb({
      decimals: 0,
      thousand: ',',
      prefix: ''
    });
    noUiSlider.create(sliderPrice, {
       start: [min_price, max_price],
      step: 100,
      range: {
        'min': [ Math.floor(min_price / 100) * 100],
        'max': [ Math.ceil(max_price / 100) * 100]
      },
      format: moneyFormat,
      connect: true
    });
    
    
    sliderPrice.noUiSlider.on('update', function(values, handle) {
      document.getElementById('sliderPrice-lower').innerHTML = values[0];
      document.getElementById('sliderPrice-upper').innerHTML = values[1];

      document.getElementById('min-price').value = parseInt(Math.floor(values[0].replace(/\,/g,'')));
      document.getElementById('max-price').value = parseInt(Math.ceil(values[1].replace(/\,/g,'')));
    });
      sliderPrice.noUiSlider.on('end', function(values, handle) {
     $('#searchForm').submit();
    });

  });

$(document).ready(function() {
   $('#searchForm').submit();
 });

  $('#searchForm').submit(function(e){
    e.preventDefault();

    var formData = $('#searchForm').serialize();
    var page = '{{$page or 'new'}}';
    formData=formData+"&type="+page;
    console.log(formData);
    $.ajax({
      method:'get',
      url:'{{url('boats')}}',
      data:formData,
      dataType    : 'json',
      success:function(retData){
        var content = '';
        if(!$.trim(retData.boats.data)){
          content = "<h4>No data to display</h4>";
        }
        if(retData.page == 'buy'){
          $.each(retData.boats.data, function(key,data){
            content += getHalfWidthView(data);
          });
        } else {
          $.each(retData.boats.data, function(key,data){
            content += getFullWidthView(data);
          });
        }
        $('#boatContent').html(content);
      },
      error:function(e){
        console.log(e);
      },
      completed:function(){

      }
    });
  });

  function getFullWidthView(data){
    return '<div class="col-md-12 no-padding"><a href="'+data.detailPageUrl+'" class="clearfix"><div class="col-md-5"><div class="buy-img"><img src="'+data.imageUrl+'"></div></div><div class="col-md-7"><h4>'+data.title+'</h4><p>'+data.description+'</p><div class="ap clearfix"><div class="a">'+data.location+'</div><div class="p">'+data.price.toLocaleString()+' '+ data.currency+'</div></div></div></a></div>';

  }

  function getHalfWidthView(data){
  return '<div class="col-md-6"><a href="'+data.detailPageUrl+'"><div class="buy-img"><img src="'+data.imageUrl+'"></div><h4>'+data.title+'</h4><div class="ap clearfix"><div class="a">'+data.price.toLocaleString()+' '+ data.currency+'</div></div></a></div>';
  }

</script>


@endsection