@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">



	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header" style="background: #ff7200">
				<h2 style="color:#FFF">Boat</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<br/>
					<a href="{{url('admin/boats/add')}}" class="list-group-item">Add</a>
					<a href="{{url('admin/boats')}}" class="list-group-item">Manage</a>
					<br/>
				</div>
			</div>
		</div>
	</div>





</div>
@endsection