@extends('admin.layout.app')

@section('active_menu','mnu-boat')
@section('active_submenu', 'manage')

@section('styles')
@parent
 <!-- JQuery DataTable Css -->
    <link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection


@section('content')

<div class="row">
@if(!$boats->isEmpty())

<div class="col-sm-12 mode" id="ListMode">
	<div class="card">
		<div class="header bg-project">
			<h2 class="">Manage Boat</h2>
		</div>

		<div class="body table-wrapper">
			@if (session()->has('message'))
			<div class="alert {{session()->get('status')}}">
				<ul>
					<li>{!!session()->get('message')!!}</li>
				</ul>
			</div>
			@endif

			<table class="table table-bordered table-responsive table-striped table-hover js-basic-example dataTable"  data-page-length="50">
				<thead>
					<tr>
						<th width="10">Sl.No</th>
						<th  width="10">Image</th>
						<th>Title</th>
						<th>Brand</th>
						<th>Boat Type</th>
						<th>Price</th>
						<th width="10">Edit</th>
						<th width="10">Delete</th>
					</tr>
				</thead>
				<tbody>
					
					
					@foreach($boats as $boat)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
						@if($boat->imageUrl() != null)
						<img height="50px" src="{{$boat->imageUrl()}}">
						@endif
						</td>
						<td><a href="{{$boat->detailPageUrl()}}" target="_blank">{{$boat->title}}</a></td>
						<td>{{@$boat->brand->name}}</td>
						<td>{{@$boat->type->name}}</td>
						<td>{{number_format($boat->price)}} {{$boat->currency}}</td>
						<td><a href="{{url('admin/boats/edit/'.$boat->id)}}"><i class="material-icons">edit</i></a></td>
						<td width="5px"><a href="{{url('admin/boats/'.$boat->id)}}" onclick="if(!confirm('Are you sure want to delete?')) return false;event.preventDefault();
                                                 document.getElementById('delete-form-{{$boat->id}}').submit();">
                                                 <form id="delete-form-{{$boat->id}}" action="{{ url('admin/boats/'. $boat->id) }}" method="post" style="display: none;">
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


@else
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="body">
					No data to display.
					<a href="{{url('admin/boats/add')}}" class="btn btn-info pull-right">Add Boat</a>
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

@endsection