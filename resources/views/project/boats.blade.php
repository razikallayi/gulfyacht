@extends('project.layout.master')

@section('styles')
@parent
<style type="text/css">
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
  background-color: #ff7200;
}
</style>
@endsection
@section('content')

<div class="abt ">
  <div class="container">
    <div class="col-md-12 no-padding">
     <div class="abt-tp con">
       <h3>{{$menu or 'Used Boats'}}</h3>
     </div>

   </div>
 </div>
</div>


<div class="buy-sec">
 <div class="container">
   <div class="col-md-12 no-padding">
    <form id="searchForm" action="{{url('boats')}}">
      <div class="row middle">
       <div class="col-md-4">
         <div class="jq_sidebar_fix">
          <div class="localnavi">
            @if($brands->isNotEmpty())
            <div id="collapse-menu" class="collapse-container">
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
          </div>
          @endif

          @if($menu=='inventory')
          <div id="collapse-menu" class="collapse-container">
           <h3>Type <span class="arrow-r"></span></h3>
           <div>
            <ul class="filt read-more-wrap">
              <li class="filt__item">
                <label class="label--checkbox"><input name="type[]" value="new" type="checkbox"  class="checkbox" >New</label>
              </li>
              <li class="filt__item">
                <label class="label--checkbox"><input name="type[]" value="used" type="checkbox" class="checkbox" >Used</label>
              </li>
            </ul>
          </div>
        </div>
        @endif

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
            <li><a href="tel:+974 4482 0250"> <img src="{{url('project/images/phn.png')}}"> +974 4482 0250</a></li>
            <li><a href="mailto:mail@gulf-yachts.com"> <img src="{{url('project/images/mail.png')}}"> mail@gulf-yachts.com</a></li>
          </ul>
          <div class="bs"><a href="{{url('brands')}}">BUY</a></div>
          <div class="bs"><a href="{{url('sell')}}">SELL</a></div>
          <div class="sbbs-img"><img src="{{url('project/images/sbbs.png')}}"></div>
        </div>
      </div>
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

    {{-- <span class="boatPagination"></span> --}}

    {{-- {{ $boats->links('vendor.pagination.project-pagination') }} --}}
  </div>
  <div class="buy-mn nb">
   <div class="row">
    <div id="boatContent">
    </div>

    {{-- <div  class="boatPagination" class="col-md-12"> --}}
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
@parent
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



    var sliderLength = document.getElementById('sliderLength');

    noUiSlider.create(sliderLength, {
      start: [filterLimits.min_length, filterLimits.max_length],
      step: 10,
      range: {
        'min': [filterLimits.min_length],
        'max': [filterLimits.max_length]
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
     search();
   });





    var sliderYear = document.getElementById('sliderYear');
    var moneyFormat = wNumb({
      decimals: 0,
      thousand: ',',
      prefix: ' '
    });
    noUiSlider.create(sliderYear, {
      start: [filterLimits.min_year, filterLimits.max_year],
      step: 1,
      range: {
        'min': [filterLimits.min_year],
        'max': [filterLimits.max_year]
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
      search();
    });

    


    var sliderPrice = document.getElementById('sliderPrice');
    var moneyFormat = wNumb({
      decimals: 0,
      thousand: ',',
      prefix: ''
    });
    noUiSlider.create(sliderPrice, {
     start: [filterLimits.min_price, filterLimits.max_price],
     step: 100,
     range: {
      'min': [ Math.floor(filterLimits.min_price / 100) * 100],
      'max': [ Math.ceil(filterLimits.max_price / 100) * 100]
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
     search();
   });

  });

  $(document).ready(function() {
   search();
 });
  $('input[name="brands[]"').change(function() {
   $search();
 });

  $('input[name="type[]"').change(function() {
    search();
  });
  pagination={
    loading : false,
    freshPage:true
  };

  function search(){
    pagination.freshPage=true;
    $('#searchForm').submit();
  }


  $('#searchForm').submit(function(e){
    e.preventDefault();
    var menu = '{{$menu or 'boats'}}';
    var page = pagination.current_page;

    var formData = $('#searchForm').serialize();
    formData=formData+"&menu="+menu+"&page="+page;
    $.ajax({
      method:'post',
      url:$('#searchForm').attr('action'),
      data:formData,
      dataType    : 'json',
      success:function(retData){
        var content = '';
        if(!$.trim(retData.boats.data)){
          content = "<h4>No data to display</h4>";
        }

        if(retData.menu == 'inventory'){
          getView = getHalfWidthView;
        }else{
          getView = getFullWidthView;
        }

        $.each(retData.boats.data, function(key,data){
          var boat={};
          boat.detailPageUrl = data.detailPageUrl==null?' ':data.detailPageUrl;
          boat.id = data.id==null?' ':data.id;
          boat.imageUrl  = data.imageUrl==null?'':data.imageUrl;
          boat.title  = data.title==null?' ':data.title;
          boat.description  = data.description==null?' ':data.description;
          boat.location  = data.location==null?' ':data.location;
          boat.price  = data.price==null?'0':data.price.toLocaleString('en-US');
          boat.currency  = data.currency==null?"QAR":data.currency;
          content += getView(boat);
        });

        // $('#boatPagination').html(paginationView(retData.boats));
        // $('.boatPagination').html(retData.pagination);
        pagination.loading=false;
        pagination.setPaginationData(retData.boats);

        if(pagination.freshPage){
          $('#boatContent').html(content);
        }else{
          $('#boatContent').append(content);
        }
      },
      error:function(e){
        console.log(e);
      },
      completed:function(){

      }
    });
  });

  getFullWidthView = function(boat){
    return '<div class="col-md-12 no-padding"><a href="'+boat.detailPageUrl+'" class="clearfix"><div class="col-md-5"><div class="buy-img"><img src="'+boat.imageUrl+'"></div></div><div class="col-md-7"><h4>'+boat.title+'</h4><p>'+boat.description+'</p><div class="ap clearfix"><div class="a">'+boat.location+'</div><div class="p">'+boat.price+' '+ boat.currency+'</div></div></div></a></div>';

  }

  getHalfWidthView = function(boat){
    return '<div class="col-md-6"><a href="'+boat.detailPageUrl+'"><div class="buy-img"><img src="'+boat.imageUrl+'"></div><h4>'+boat.title+'</h4><div class="ap clearfix"><div class="a">'+boat.location+'</div><div class="p">'+boat.price+' '+ boat.currency+'</div></div></a></div>';
  }

  pagination.setPaginationData = function(boats){
    pagination.total=boats.total;
    pagination.current_page=boats.current_page;
    pagination.from=boats.from;
    pagination.to=boats.to;
    pagination.next_page_url=boats.next_page_url;
    pagination.last_page=boats.last_page;
    pagination.per_page=boats.per_page;
  }

  $(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() > $(document).height() - ($('footer')[0].scrollHeight+300)) {

    if(pagination.loading){
      return;
    }
    if(pagination.current_page >= pagination.last_page){
      return;
    }
    pagination.loading = true;
    pagination.freshPage = false;
    var url = $(this).attr('href');
    pagination.current_page++;
    $('#searchForm').attr('action',url);
    $('#searchForm').submit();
      // window.history.pushState("", "", url);
    }
  });

  function getPageNumber(url) {
    name = 'page';
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

</script>

<script src="{{url('project/js/jquery.sidebarFix.js')}}" type="text/javascript"></script>
<script type="text/javascript">
	$(window).load(function(){
		$('.jq_sidebar_fix').sidebarFix({
			frame: $('.middle')
		});
	});
</script>

@endsection