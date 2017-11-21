@extends('project.layout.master')

@section('styles')
@parent
<style>
.p-20{
  padding:20px;
}
.ml-20{
  margin-left:20px;
}
</style>
@endsection
@section('content')

<div class="abt ">
  <div class="container">
    <div class="col-md-12 no-padding">
     <div class="abt-tp con">
       <h3>NEW BOATS</h3>
     </div>

   </div>
 </div>
</div>


<div class="buy-sec">
 <div class="container">
  <div class="col-md-12 no-padding bnds">
    <div id="owl-demo" class="owl-carousel ">
     @foreach($brands as $brand)
     <div class="item"><a href="{{$brand->detailPageUrl()}}"  target="_blank"><img src="{{$brand->imageUrl()}}"></a></div>
     @endforeach
   </div>     
 </div>

 <div class="col-md-12 no-padding">
  <form id="searchForm">
    <div class="row">



      <div class="col-md-12">
        <div class="buy-mn nb">
         <div class="row">
          <div id="boatContent">
            <div class="row">
              @foreach($brands as $brand)
              <div class="col-md-12 no-padding"><div class="col-md-4"><div class="buy-img"><a target="_blank" href="{{$brand->detailPageUrl()}}" class="clearfix"><img src="{{$brand->imageUrl()}}"></a></div></div><div class="col-md-8">
                <div class=" clearfix">
                  <p>{{str_limit($brand->description,1000)}}</p>
                </div>
                @if(mb_strlen($brand->description)>1000)
                <a class="pull-right" href="link" data-toggle="modal" data-target="#brand-{{$brand->slug}}">Read more</a>
                @endif
              </div></div>

              @if(mb_strlen($brand->description)>1000)
              <div id="brand-{{$brand->slug}}" class="modal fade" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{$brand->name}}</h4>
                    </div>
                    <div class="modal-body">
                      
                      <img class="ml-20" height="200px" src="{{$brand->imageUrl()}}" />
                      <p class="p-20">{{$brand->description}}</p>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @endforeach

            </div>
          </div>

          <div class="col-md-12">
           
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


@endsection
