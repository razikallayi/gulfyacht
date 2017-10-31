@extends('admin.layout.master')

@section('active_menu','mnu-banner')
@section('active_submenu','manage')

@section('content')

<div class="row">
	<div class="col-sm-12">
		@if (session()->has('message'))
		<div class="alert {{session()->get('status')}}">
			<ul>
				<li>{!!session()->get('message')!!}</li>
			</ul>
		</div>
		@endif
	</div>


	@if(!$banners->isEmpty())
	<div class="col-sm-12 connectedSortable">
		@foreach($banners as $banner)

		<div id="sort_{{$banner->id}}" class="col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header" >
					<h2 style="white-space: nowrap;overflow:hidden">
						<span>{{$loop->iteration}}</span>
						<small></small>
					</h2>

					<ul class="header-dropdown m-r--5">
						<li><a href="{{url('admin/banners/'.$banner->id)}}" onclick="event.preventDefault();
							document.getElementById('delete-form-{{$banner->id}}').submit();">
							<form id="delete-form-{{$banner->id}}" action="{{ url('admin/banners/'. $banner->id) }}" method="post" style="display: none;">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
							</form><i class="material-icons">delete</i></a></li>
						</ul>
					</div>
					<div class="body">
						<div  id="carousel-{{$banner->id}}"  class="carousel slide">
							<div class="carousel-inner" role="listbox">
								<div style="min-height:150px;" class="banner active">
									@if($banner->image!=NULL)
									<img width="100%" style="margin:auto;" src="{{url(App\Models\Banner::IMAGE_LOCATION.'/'.$banner->image)}}" />
									@endif
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
			@endforeach
		</div>
	@else
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="body">
				No data to display.
				<a href="{{url('admin/banners/add')}}" class="btn btn-info pull-right">Add Banner</a>
			</div>
		</div>
	</div>
	@endif
</div>

@endsection

@section('scripts')
@parent

	<!-- jquery sortable Plugin Css -->
	<link href="{{url('md/plugins/jquery-sortable/jquery-sortable.min.css')}}" rel="stylesheet">
	<!-- Jquery sortable Plugin Js -->
	<script src="{{url('md/plugins/jquery-sortable/jquery-sortable.min.js')}}"></script>
	<script type="text/javascript">
    	$(".connectedSortable").sortable({
    		connectWith: ".connectedSortable",
    		revert: 200,
    		handle: ".card",
    		zIndex: 999999
    	});
    	$(".connectedSortable .card").css("cursor", "move");
    	$(".connectedSortable").on( "sortupdate", function( event, ui ) {
    		var order = $(this).sortable("serialize") + '&action=updateCategoryListings';
    		$.post("{{url('admin/banners/sort')}}", order);
    	});
    </script>

    <script type="text/javascript">
    	$.ajaxSetup({
    		headers: {
    			'X-CSRF-Token': Laravel.csrfToken
    		}
    	});
    </script>


@endsection