@extends('project.layout.master')

@section('content')

<div class="abt ">
  <div class="container">
    <div class="col-md-12 no-padding">
       <div class="abt-tp con">
         <h3>BUY BOAT</h3>
       </div>
       
    </div>
  </div>
</div>


<div class="buy-sec">
   <div class="container">
      <div class="col-md-12 no-padding">
        <div class="row">
           <div class="col-md-4">
        
        <div id="collapse-menu" class="collapse-container">
           @if(true) {{-- only for but --}}
            <h3>Brands <span class="arrow-r"></span></h3>
            <div>
            <input type="checkbox" class="read-more-state" id="post-2" />
                <ul class="filt read-more-wrap">
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >Prestige</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Everglades</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Bayliner</label>
                    </li>
                    
                    <div class="read-more-target">
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >Prestige</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Everglades</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Bayliner</label>
                    </li>
                    </div>
                </ul>
              <label for="post-2" class="read-more-trigger"></label>  
            </div>
            @endif

            <h3>Length <span class="arrow-d"></span></h3>
            <div>
            <input type="checkbox" class="read-more-state" id="post-3" />
                <ul class="filt read-more-wrap">
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >50 Ft. - 100 Ft.</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">150 Ft. - 200 Ft.</label>
                    </li>
                   <div class="read-more-target">
                     <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >50 Ft. - 100 Ft.</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">150 Ft. - 200 Ft.</label>
                    </li>
                    
                   </div> 
                </ul>
                <label for="post-3" class="read-more-trigger"></label> 
            </div>
            
        </div>
        
        <div class="fby clearfix">
            <div class="col-md-12 no-padding">
                <h4>Filter By Year</h4>
                <div class="slider-labels">
            <div class="col-xs-6 caption no-padding">
            From<span id="slider-range3-value1" class="orange-color"></span>
            </div>
            <div class="col-xs-6 caption no-padding">
            To<span id="slider-range3-value2" class="orange-color"></span>
            </div>
            </div>
                <div id="slider-range3"></div>
            </div>
               
        </div>
        
        <div class="fby fbs clearfix">
            <div class="col-md-12 no-padding">
                <h4>Filter By Price</h4>
                <div class="slider-labels">
            <div class="col-xs-6 caption no-padding">
            QAR<span id="slider-range4-value1" class="orange-color"></span>
            </div>
            <div class="col-xs-6 caption no-padding">
            QAR<span id="slider-range4-value2" class="orange-color"></span>
            </div>
            </div>
             <div id="slider-range4"></div>
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
  <select name="select-profession" id="select-profession">
    <option value="" disabled>Sort By</option>
    <option value="">Popularity</option>
    <option value="">Price--Low to High</option>
    <option value="">Price--High to Low</option>
    <option value="">Newest First</option>
  </select>
</div>

{{ $boats->links('vendor.pagination.project-pagination') }}
             </div>
              <div class="buy-mn">
                 <div class="row">
                  @foreach($boats as $boat)
                  <div class="col-md-6"><a href="{{$boat->detailPageUrl()}}"><div class="buy-img"><img src="{{$boat->imageUrl()}}"></div><h4>{{$boat->title}}</h4><div class="ap clearfix"><div class="a">{{$boat->location}}</div><div class="p">{{number_format($boat->price)}} {{$boat->currency}}</div></div></a></div>
                  @endforeach
                 <div class="col-md-12">
                   <div class="btm-pagi">
                    {{ $boats->links('vendor.pagination.project-pagination') }}
                   </div>
                 </div>
                 </div>
              </div>
           </div>
        </div>
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
  accordion: true,
});
$('#collapse-menu').collapsible({
  contentOpen: 0
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
  
  $(this).siblings('.sel__box__options').removeClass('selected');
  $(this).addClass('selected');
  
  var $currentSel = $(this).closest('.sel');
  $currentSel.children('.sel__placeholder').text(txt);
  $currentSel.children('select').prop('selectedIndex', index + 1);
});
</script>
@endsection