@extends('gulf.layout.master')

@section('content')

<div class="abt-tp"></div>

<div class="tc">
  	<div class="tc-ttl">
       <div class="container">
          <div class="col-md-12">
             <h2>Terms and Conditions</h2>
          </div>
       </div>
    </div>
    
    <div class="container">
       <div class="col-md-12">
       @foreach($terms as $term)
       <h4>{{$term->serial_number}}. {{$term->title}} </h4>
          <p>{!! nl2br(e($term->content)) !!}</p>
       @endforeach
       </div>
    </div>
    
</div>


@include('gulf.layout.partials.featured')
@endsection