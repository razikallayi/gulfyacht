@extends('admin.layout.master')

@section('active_menu','mnu-faq')
@section('active_submenu','add')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
		<div class="header bg-deep-purple">
			<h2 class="">Add Faq</h2>
		</div>
			<div class="body">

				<form id="form_validation" method="POST" action="{{url('admin/faqs')}}" enctype="multipart/form-data">
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

					@if (session()->has('message'))
					<div class="alert {{session()->get('status')}}">
						<ul>
							<li>{!!session()->get('message')!!}</li>
						</ul>
					</div>
					@endif

	<div class="row clearfix">


						<div class="col-md-6 col-sm-12">
							<label>Question</label>
							<div class="form-group ">
								<div class="form-line">
									<input type="text" value="{{old('question')}}" name="question" class="form-control" required="">
								</div>
							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<label>Question Arabic</label>
							<div class="form-group ">
								<div class="form-line">
									<input type="text" value="{{old('question_ar')}}" name="question_ar" class="form-control">
								</div>
							</div>
						</div>

					

						<div class="col-md-6 col-sm-12">
							<label>Answer</label>
							<div class="form-group">
								<div class="form-line">
									<textarea rows="10" name="answer" class="form-control" >{{old('answer')}}</textarea>
								</div>
							</div>
						</div>


						<div class="col-md-6 col-sm-12">
							<label>Answer Arabic</label>
							<div class="form-group">
								<div class="form-line">
									<textarea rows="10" name="answer_ar" class="form-control" >{{old('answer_ar')}}</textarea>
								</div>
							</div>
						</div>

						<div class="col-sm-12">
							<label>Publish Faq</label>
							<div class="form-group">
								@php
								$checked = " checked ";
								if(old('question')){
									if(old('is_published')!=1){
										$checked=" ";
									}
								}
								@endphp
								<input type="checkbox" name="is_published" value="1" id="is_published" class="filled-in chk-col-blue" {{$checked}}>
								<label for="is_published">Publish</label>
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
</div>

@endsection