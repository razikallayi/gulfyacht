@extends('gulf.layout.master')
@section('content')

<div class="abt-tp"></div>

<div class="nws-sec">
  <div class="nws-ttl"><h2>Latest News & Events</h2><p></p></div>
  <div class="container">
    <div class="col-md-12 no-padding">
     <div class="tabs">


@foreach($allNews as $news)
      <div class="tab">
        <div class="tab-toggle">
         <div class="row">
          <div class="col-md-5">
            @if($news->medias->first() != null)
            <img src="{{url(App\Models\News::IMAGE_LOCATION.'/'.$news->medias->first()->image)}}" class="img-responsive">
            @endif
          </div>
          <div class="col-md-7">
            <h4>{{$news->title}}</h4>
            <p>{{str_limit($news->content)}}</p>
            <div class="col-md-12 no-padding date">
              <div class="col-md-6 no-padding"><img src="{{url('gulf/images/clock.png')}}">{{$news->created_at->format('d-m-y')}}</div>
              {{-- <div class="col-md-6 no-padding"> <a href="#"> Read More </a></div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
     @if($news->medias->first() != null)
     <img src="{{url(App\Models\News::IMAGE_LOCATION.'/'.$news->medias->first()->image)}}" class="img-responsive">
     @endif

     <h3>{{$news->title}}</h3>
     <h6><img src="{{url('gulf/images/clock.png')}}"> {{$news->created_at->format('d-m-y')}}</h6>
     <p>{!! nl2br(e($news->content)) !!}</p>
    </div>
@endforeach
  </div>
</div>
</div>
</div>


@include('gulf.layout.partials.featured')
@endsection

@section('scripts')
@parent
<script>
  wrapper = $('.tabs');
  tabs = wrapper.find('.tab');
  tabToggle = wrapper.find('.tab-toggle');
  function openTab() {
    var content = $(this).parent().next('.content'), activeItems = wrapper.find('.active');
    if (!$(this).hasClass('active')) {
      $(this).add(content).add(activeItems).toggleClass('active');
      wrapper.css('min-height', content.outerHeight());
    }
  }
  ;
  tabToggle.on('click', openTab);
  $(window).load(function () {
    tabToggle.first().trigger('click');
  });


</script>
@endsection