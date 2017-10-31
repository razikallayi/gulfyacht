@extends('gulf.layout.master')
@section('content')


<div class="abt-tp"></div>
@section('searchtype','serch-bxbt')
@include('gulf.layout.partials.search')

<div class="sec2">
  <div class="container">
    <div class="col-md-12 no-padding">
       <div class="row">
        @if($properties->isEmpty())
        <div class="col-md-12">
        <h3 align="center">No data to display</h3>
          @else
       @foreach($properties->take(3) as $property)

        <div class="col-md-4">
         <a href="{{url('property/'.$property->slug)}}">
          <div class="sec2-img" >
            @if($property->medias->first() != null)
            <img src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}}" >
            @endif
          </div>
          <div class="sec-det clearfix">
            <div class="faci">
             <ul>
               @if($property->bedroom != null)
                 @if($property->bedroom ==-1)
                   <li><img src="{{url('gulf/images/studio.png')}}"></li>
                 @else
                   <li><img src="{{url('gulf/images/bd.png')}}"> X {{$property->bedroom}}</li>
                 @endif
               @endif
               @if($property->bathroom != null)
               <li><img src="{{url('gulf/images/bath.png')}}"> X {{$property->bathroom}}</li>
               @endif
             </ul>
           </div>
           @if($property->price != null)
           <div class="pr-sec2">{{number_format($property->price)}} {{$property->currency}}</div>
           @endif
         </div>
         <div class="sec2-mdet"><h4>{{str_limit($property->title,38)}}</h4><p> <i class="avenueicon-placeholder"></i> {{ str_limit($property->getAddress(),45)}}</p></div>
       </a>
     </div>

     @endforeach
@endif
       </div>
    </div>
  </div>
</div>

<div class="sec3">
  <div class="container">
    <div class="col-md-12 no-padding">
       <div class="pag">
      <ul id="itemContainer" class="clearfix">
        @foreach($properties->slice(3) as $property)
        <li><a href="{{url('property/'.$property->slug)}}"><i class="avenueicon-external-link lk"></i>
        	<div class="pag-ig">
            @if($property->medias->first() != null)
            <img src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}}">
            @endif
          </div>
          <div class="pag-dt"><h4>{{str_limit($property->title,50)}}</h4><p> <i class="avenueicon-placeholder"></i> {{ str_limit($property->getAddress(),40)}}</p><div class="fc">
          <ul>
          @if($property->bedroom != null)
                 @if($property->bedroom ==-1)
                   <li><img src="{{url('gulf/images/studio.png')}}"></li>
                 @else
                   <li><img src="{{url('gulf/images/bd.png')}}"> X {{$property->bedroom}}</li>
                 @endif
               @endif
          <li><img src="{{url('gulf/images/bath.png')}}"> X {{$property->bathroom}}</li>
          </ul>
          </div><div class="ps">{{$property->price?number_format($property->price)." ".$property->currency:0}}</div></div>
        </a>
      </li>
      @endforeach
        
      </ul>
      <div class="holder">
      </div>
    </div>
    </div>
  </div>
  
  <div class="text-center">
   {{ $properties->links() }}
  </div>


</div>

@include('gulf.layout.partials.featured')


@endsection

@section('scripts')
@parent

<script src="{{url('gulf/js/jPages.js')}}"></script>
<script>
 /* $(function() {
  $("div.holder").jPages({
    containerID: "itemContainer"
  });
  });*/
</script>


<script>

  $(function() {
    @if($categoryId == 1)
    var activeNav = 'rent';
    @elseif($categoryId == 2)
    var activeNav = 'buy';
    @elseif($categoryId == 3)
    var activeNav = 'international';
    @else
    var activeNav = '';
    @endif

    $(".navbar-menu ul li").removeClass('active');
    $(".navbar-menu ul li").each(function(){    
      if($(this).attr("class") == activeNav){
        $(this).addClass('active');
      }
    });
  });


</script>
@endsection