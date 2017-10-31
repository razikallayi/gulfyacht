@extends('admin.layout.master')

@section('active_menu','mnu-faq')
@section('active_submenu','manage')

@section('styles')
@parent
 <!-- JQuery DataTable Css -->
    <link href="{{url('md/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection


@section('content')

<div class="row">
@if(!$faqs->isEmpty())
<div class="col-sm-12">
	<div class="card">
		<div class="header bg-deep-purple">
			<h2 class="">Manage Faqs</h2>
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
						<th width="10px">Sl.No</th>
						<th>Question</th>
						<th>Answer</th>
						<th width="10px">Edit</th>
						<th width="10px">Delete</th>
					</tr>
				</thead>
				<tbody>
					
					
					@foreach($faqs as $faq)
					
					
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$faq->question}}</td>
						<td>{{$faq->answer}}</td>
						<td><a href="{{url('admin/faqs/edit/'.$faq->id)}}"><i class="material-icons">edit</i></a></td>
						<td width="5px"><a href="{{url('admin/faqs/'.$faq->id)}}" onclick="if(!confirm('Are you sure want to delete?')) return false;event.preventDefault();
                                                 document.getElementById('delete-form-{{$faq->id}}').submit();">
                                                 <form id="delete-form-{{$faq->id}}" action="{{ url('admin/faqs/'. $faq->id) }}" method="post" style="display: none;">
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
					<a href="{{url('admin/faqs/add')}}" class="btn btn-info pull-right">Add Faqs</a>
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