@extends('admin.layout.app')

@section('active_menu','mnu-brand')
@section('active_submenu', 'manage-product')

@section('styles')
@parent
    <link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection


@section('content')

<div class="row">
@if(!$products->isEmpty())

<div class="col-sm-12 mode" id="ListMode">
	<div class="card">
		<div class="header bg-project">
			<h2 class="">Manage Product</h2>
		</div>

		<div class="body table-wrapper">
			@if (session()->has('message'))
			<div class="alert {{session()->get('status')}}">
				<ul>
					<li>{!!session()->get('message')!!}</li>
				</ul>
			</div>
			@endif

			<table class="table table-bordered table-responsive table-striped table-hover dataTable"  data-page-length="50">
				<thead>
					<tr>
						<th width="10">Sl.No</th>
						<th  width="10">Image</th>
						{{-- <th>Name</th> --}}
						<th>Brand</th>
						<th >Link</th>
						<th width="10">Edit</th>
						<th width="10">Delete</th>
					</tr>
				</thead>
				<tbody>
					
					
					@foreach($products as $product)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
						<img height="50px" src="{{@$product->imageUrl()}}">
						</td>
						{{-- <td>{{@$product->name}}</td> --}}
						<td>{{@$product->brand->name}}</td>
						<td><a href="{{$product->detailPageUrl()}}" target="_blank">{{$product->url}}</a></td>
						<td><a href="{{url('admin/products/edit/'.$product->id)}}"><i class="material-icons">edit</i></a></td>
						<td width="5px"><a href="{{url('admin/products/'.$product->id)}}" onclick="if(!confirm('Are you sure want to delete?')) return false;event.preventDefault();
                                                 document.getElementById('delete-form-{{$product->id}}').submit();">
                                                 <form id="delete-form-{{$product->id}}" action="{{ url('admin/products/'. $product->id) }}" method="post" style="display: none;">
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
					<a href="{{url('admin/products/add')}}" class="btn btn-info pull-right">Add Product</a>
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
		$('.dataTable').DataTable();
	});
</script>

@endsection