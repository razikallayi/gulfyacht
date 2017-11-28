@extends('project.layout.master')

@section('header','')
@section('footer','')

@section('content')

@php
$filterLimits = App\Models\Boat::select(
	\DB::raw('min(length) as min_length'),
	\DB::raw('max(length) as max_length'),

	\DB::raw('min(year) as min_year'),
	\DB::raw('max(year) as max_year'),

	\DB::raw('min(price) as min_price'),
	\DB::raw('max(price) as max_price')
)->first()->toArray();

@endphp



<div class="wrapper">
<div class="slider">

<div class="main-sec">
<nav class="navbar navbar-default bootsnav">
    @include('project.layout.partials.navigation')
</nav>



<div style="z-index:1222000; margin-top: 300px;" class="text-center">
  <h2>Page Not Found!</h2>
  <h4>please check the url!</h4>
  <a class="btn btn-lg btn-info" href="{{URL::previous()}}" >go back</a>
</div>


</div>

</div>


@endsection