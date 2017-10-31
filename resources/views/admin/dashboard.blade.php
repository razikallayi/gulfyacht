@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">



	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header" style="background: #a8172a">
				<h2 style="color:#FFF">Banner</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<br/><br/>
					<a href="{{url('admin/banners/add')}}" class="list-group-item">Add</a>
					<a href="{{url('admin/banners')}}" class="list-group-item">Manage</a>
					<br/><br/>
				</div>
			</div>
		</div>
	</div>



	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header" style="background: #a8172a">
				<h2 style="color:#FFF">News</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<br/><br/>
					<a href="{{url('admin/news/add')}}" class="list-group-item">Add</a>
					<a href="{{url('admin/news')}}" class="list-group-item">Manage</a>
					<br/><br/>
				</div>
			</div>
		</div>
	</div>



	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header" style="background: #a8172a">
				<h2 style="color:#FFF">Terms and Conditions</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<br/><br/>
					<a href="{{url('admin/terms/add')}}" class="list-group-item">Add</a>
					<a href="{{url('admin/terms')}}" class="list-group-item">Manage</a>
					<br/><br/>
				</div>
			</div>
		</div>
	</div>



	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header" style="background: #a8172a">
				<h2 style="color:#FFF">Faq</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<br/><br/>
					<a href="{{url('admin/faqs/add')}}" class="list-group-item">Add</a>
					<a href="{{url('admin/faqs')}}" class="list-group-item">Manage</a>
					<br/><br/>
				</div>
			</div>
		</div>
	</div>


	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header" style="background: #a8172a">
				<h2 style="color:#FFF">Property</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<a href="{{url('admin/propertytypes')}}" class="list-group-item">Property Types</a>
					<a href="{{url('admin/amenties')}}" class="list-group-item">Amenities</a>
					<a href="{{url('admin/properties/add')}}" class="list-group-item">Add Property</a>
					<a href="{{url('admin/properties')}}" class="list-group-item">Manage Properties</a>
				</div>
			</div>
		</div>
	</div>






</div>
@endsection