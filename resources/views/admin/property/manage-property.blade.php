@extends('admin.layout.master')

@section('active_menu','mnu-property')
@section('active_submenu', $page)

@section('styles')
@parent
 <!-- JQuery DataTable Css -->
    <link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection


@section('content')

<div class="row">
@if(!$properties->isEmpty())

<div class="col-sm-12 mode" id="ListMode">
	<div class="card">
		<div class="header bg-deep-purple">
			<h2 class="">Manage Property @if($page=='manage')<a href="{{url('admin/properties/sort').'?page='.$page}}"><i class="material-icons pull-right">view_module</i></a>@endif</h2>
		</div>

		<div class="body table-wrapper">
			@if (session()->has('message'))
			<div class="alert {{session()->get('status')}}">
				<ul>
					<li>{!!session()->get('message')!!}</li>
				</ul>
			</div>
			@endif
{{-- 
			<input type="checkbox" name="featured" id="featured" onchecked="" class="filled-in chk-col-deep-purple" >
			<label for="featured">Featured Property</label> --}}

			<table class="table table-bordered table-responsive table-striped table-hover js-basic-example dataTable"  data-page-length="50">
				<thead>
					<tr>
						<th>Sl.No</th>
						<th>Image</th>
						<th>Reference</th>
						<th>Title</th>
						<th>Category</th>
						<th>Property Type</th>
						<th>Address</th>
						<th>Price</th>
						<th >Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					
					
					@foreach($properties as $property)
					
					{{-- {{dd(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}} --}}
					
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
						@if($property->getThumbnail() != null)
						<img height="50px" src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}}">
						@endif
						</td>
						<td>@if($property->reference_id){{$property->reference_id}}@else {{'0'}}@endif</td>
						<td>{{$property->title}}</td>
						<td>{{App\Models\Property::CATEGORIES[$property->category_id]['name']}}</td>

						<td>@if($property->type){{$property->type->name}}@endif</td>
						<td>{{$property->getAddress()}}</td>
						<td>{{number_format($property->price)}} {{$property->currency}}</td>
						<td><a href="{{url('admin/properties/edit/'.$property->id)}}"><i class="material-icons">edit</i></a></td>
						<td width="5px"><a href="{{url('admin/properties/'.$property->id)}}" onclick="if(!confirm('Are you sure want to delete?')) return false;event.preventDefault();
                                                 document.getElementById('delete-form-{{$property->id}}').submit();">
                                                 <form id="delete-form-{{$property->id}}" action="{{ url('admin/properties/'. $property->id) }}" method="post" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form><i class="material-icons">delete</i></a></td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>

{{-- 
<div class="col-sm-12 mode" id="SortMode" style="display:none">
<div class="card">
	<div class="header bg-deep-purple">
		<h2 class="">Manage Property<a href="javascript:void(0);" onClick="viewMode('ListMode')" title="List view"><i class="material-icons pull-right">view_module</i></a></h2>
	</div>
	</div>
		@foreach($properties->chunk(4) as $chunk)
		<div class="col-md-12 connectedSortable">
		@foreach($chunk as $property)
			<div id="sort_{{$property->id}}" class="col-md-3 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header" >
						<h2 style="white-space: nowrap;overflow:hidden">
							<span>@if($property->reference_id){{$property->reference_id}}@else {{'0'}}@endif</span>
							<small><b>{{$property->title}}</b></small>
							<small>{{$property->getAddress()}}</small>
							<small>{{number_format($property->price)}} {{$property->currency}}</small>
						</h2>

						<ul class="header-dropdown m-r--5">
						<li><a href="{{url('admin/properties/edit/'.$property->id)}}"><i class="material-icons">edit</i></a></li>
							<li><a href="{{url('admin/properties/'.$property->id)}}" onclick="event.preventDefault();
								document.getElementById('delete-form-{{$property->id}}').submit();">
								<form id="delete-form-{{$property->id}}" action="{{ url('admin/properties/'. $property->id) }}" method="post" style="display: none;">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								</form><i class="material-icons">delete</i></a></li>
							</ul>
						</div>
						<div class="body">
							<div  id="carousel-{{$property->id}}"  class="carousel slide">
								<div class="carousel-inner" role="listbox">
									<div class="property active">
										@if($property->getThumbnail() != null)
										<img class="img-responsive" src="{{url(App\Models\Property::IMAGE_LOCATION.'/'.$property->getThumbnail()->image)}}">
										@endif
									</div>

								</div>

							</div>
						</div>

					</div>
				</div>
			@endforeach
			</div>
			@endforeach
		</div> --}}

@else
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="body">
					No data to display.
					<a href="{{url('admin/properties/add')}}" class="btn btn-info pull-right">Add Property</a>
				</div>
			</div>
		</div>
		@endif
	</div>

@endsection


	@section('scripts')
	@parent

	    <!-- Jquery DataTable Plugin Js -->
    <script src="{{url('md/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{url('md/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script>
	$(function () {
		$('.js-basic-example').DataTable();
	});
</script>

{{-- 
<script>
	viewMode= function(mode){
		$('.mode').slideUp(500);
		$('#'+mode).slideDown(500);
	}
</script>
 --}}

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
    		$.post("{{url('admin/properties/sort')}}", order);
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