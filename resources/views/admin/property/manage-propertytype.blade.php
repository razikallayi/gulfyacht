@extends('admin.layout.master')

@section('active_menu','mnu-property')
@section('active_submenu','manage-propertytype')

@section('styles')
@parent

 <!-- JQuery DataTable Css -->
    <link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection


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

		<div class="card">
			<div class="header bg-deep-purple">
				<h2 class="">Add Property Type</h2>
			</div>
			<div class="body">

				<form id="form_validation" method="POST" action="{{url('admin/propertytypes')}}" enctype="multipart/form-data">
					{{csrf_field()}}

					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					<div class="row clearfix">
						<div class="col-sm-12">
							<label>Name</label>
							<div class="form-group ">
								<div class="form-line">
									<input type="text" value="{{old('name')}}" name="name" maxlength="191" class="form-control" required="">
								</div>
							</div>
						</div>


						<div class="col-sm-12">
							<div class="form-group">
								<div class="">
									<input type="submit" id="saveButton" name="save" value="Save Data" class="btn btn-lg btn-success waves-effect" >
								</div>
							</div>
						</div>
					</div>
				</form>			
			</div>
		</div>
	</div>


	@if(!$propertyTypes->isEmpty())
	<div class="col-sm-12">
		<div class="card">
			<div class="header bg-deep-purple">
				<h2 class="">Manage Property Types</h2>
			</div>

			<div class="body table-wrapper">
				<table class="table table-bordered table-responsive table-striped table-hover js-basic-example dataTable" data-page-length="50">
					<thead>
						<tr>
							<th>Sl.No</th>
							<th>Name</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>


						@foreach($propertyTypes as $propertytype)

						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$propertytype->name}}</td>
							<td width="5px"><a href="{{url('admin/propertytypes/'.$propertytype->id)}}" onclick="if(!confirm('Are you sure want to delete?')) return false;event.preventDefault();
								document.getElementById('delete-form-{{$propertytype->id}}').submit();">
								<form id="delete-form-{{$propertytype->id}}" action="{{ url('admin/propertytypes/'. $propertytype->id) }}" method="post" style="display: none;">
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