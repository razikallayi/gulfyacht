@extends('admin.layout.app')

@section('active_menu','mnu-boat')

@section('active_submenu','add-'.$menu)

@section('content')
<div class="row">

	<div class="col-sm-12">
		<div class="card">
			<div class="header bg-project">
				<h2 class="">@if(isset($boat)) {{"Edit"}} @else {{"Add"}}  @endif {{title_case($menu)}} </h2>
			</div>
			<div class="body">
				@if(isset($boat))
				<form id="form_validation" method="POST" action="{{url('admin/boats/edit/'.$boat->id)}}" enctype="multipart/form-data">
					{{method_field('PUT')}}
					@else
					<form id="form_validation" method="POST" action="{{url('admin/boats')}}" enctype="multipart/form-data">
						@endif
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

							@if($menu == 'inventory')
							<div class="col-sm-6">
								<label>Boat Type<code>*</code> </label>
								<div class="m-t-20">
									<select name="type_id"  class="form-control show-tick" required>
										@if(isset($boatTypes) != false)
										@foreach($boatTypes as $type)
										<option value="{{$type->id}}" {{ (isset($boat) && @$boat->type->id == $type->id )?' selected ':''}} >{{title_case($type->name)}}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>

							<div class="col-sm-6">
							@else
								<input type="hidden" name="type_id" value="{{@$boatTypes->where('name','used')->first()->id}}">
								<div class="col-sm-12">
							@endif
									<label>Brand<code>*</code> </label>
									<div class="m-t-20">
										<select name="brand_id"  class="form-control show-tick" required>
											@if(isset($brands) != false)
											@foreach($brands as $brand)
											<option value="{{$brand->id}}" {{ (isset($boat) && @$boat->brand->id == $brand->id )?' selected ':''}} >{{$brand->name}}</option>
											@endforeach
											@endif
											{{-- <option value="null">Other</option> --}}
										</select>
									</div>
								</div>

								<div class="col-sm-12">
									<label>Title<code>*</code> </label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->title or old('title')}}" name="title" maxlength="191" required class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Price</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->price or old('price')}}" name="price" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Location</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->location or old('location')}}" name="location" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<label>Year</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="number" value="{{$boat->year or old('year')}}" name="year" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Length</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->length_in_unit or old('length_in_unit')}}" name="length_in_unit" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Length Unit</label>
									<div class="form-group ">
											<select name="length_unit"  class="form-control show-tick">
												<option {{ (isset($boat) && @$boat->length_unit == 'Feet')?' selected ':''}}>Feet</option>
												<option {{ (isset($boat) && @$boat->length_unit == 'Metre' )?' selected ':''}}>Metre</option>	
											</select>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Condition</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->condition or old('condition')}}" name="condition" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Color</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->color or old('color')}}" name="color" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>


								<div class="col-sm-12">
									<label>Description</label>
									<div class="form-group ">
										<div class="form-line">
											<textarea type="text" rows="3" name="description" class="form-control" >{{$boat->description or old('description')}}</textarea>
										</div>
									</div>
								</div>


								<div class=" col-sm-6">
									<label>Email</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="email" value="{{$boat->email or old('email')}}" name="email" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label>Phone</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="number" value="{{$boat->phone or old('phone')}}" name="phone" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-12">
									<h4 class="bg-project" style="padding:10px">Specification</h4>
								</div>

								<div class="col-sm-3">
									<label>Length Overall</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->length_overall or old('length_overall')}}" name="length_overall" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Overall Length Unit</label>
									<div class="form-group ">
											<select name="overall_length_unit"  class="form-control show-tick">
												<option {{ (isset($boat) && @$boat->overall_length_unit == 'Feet')?' selected ':''}}>Feet</option>
												<option {{ (isset($boat) && @$boat->overall_length_unit == 'Metre' )?' selected ':''}}>Metre</option>	
											</select>
									</div>
								</div>


								<div class="col-sm-3">
									<label>Beam</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->beam or old('beam')}}" name="beam" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>

								<div class="col-sm-3">
									<label>Draft</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->draft or old('draft')}}" name="draft" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<label>Engine</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->engine or old('engine')}}" name="engine" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>



								<div class="col-sm-4">
									<label>Power</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->power or old('power')}}" name="power" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>




								<div class="col-sm-4">
									<label>Engine Hours</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->engine_hours or old('engine_hours')}}" name="engine_hours" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>




								<div class="col-sm-4">
									<label>Fuel</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->fuel or old('fuel')}}" name="fuel" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>




								<div class="col-sm-4">
									<label>Max Speed</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->max_speed or old('max_speed')}}" name="max_speed" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>




								<div class="col-sm-4">
									<label>Cruising Speed</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->cruising_speed or old('cruising_speed')}}" name="cruising_speed" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>



								<div class="col-sm-12">
									<h4 class="bg-project" style="padding:10px">Accommodation</h4>
								</div>

								<div class="col-sm-6">
									<label>Number of cabins</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->no_of_cabins or old('no_of_cabins')}}" name="no_of_cabins" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>



								<div class="col-sm-6">
									<label>Number of berths</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->no_of_berths or old('no_of_berths')}}" name="no_of_berths" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>



								<div class="col-sm-6">
									<label>Number of heads</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->no_of_heads or old('no_of_heads')}}" name="no_of_heads" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>



								<div class="col-sm-6">
									<label>Crew</label>
									<div class="form-group ">
										<div class="form-line">
											<input type="text" value="{{$boat->crew or old('crew')}}" name="crew" maxlength="191" class="form-control" >
										</div>
									</div>
								</div>



								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Upload Images<code>*</code></label>
												<span id ="ProgressInfo"></span>
												<p id="CropSizeInfo" class="small help-block">Please upload images of size 800 x 445 for best appeal</p>
												<input id="fileupload" accept="image/*" class="col-indigo glyphicon glyphicon-picture fa-5x" name="image[]" type="file" multiple="multiple" 
												style="max-width: 75px;
												max-height: 70px;
												overflow: hidden;
												cursor: pointer;
												font-size: 5em;" />
												<hr />
												<b>Preview</b><br />
												@if(isset($boat))
												<p id="CropSizeInfo" class="small help-block">First image is shown as thumbnail in list views. Drag the image according to your preference</p>
												@endif
											</div>
										</div>

										<div id="result"  class="connectedSortable">
											@if(null != old('image'))
											@foreach(old('image') as $imageName)
											<input type="hidden" id="image-input-{{substr($imageName,0,-4)}}" name = "image[]" value="{{$imageName}}">
											<div id="image-preview-{{substr($imageName,0,-4)}}" class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:100px"><span>
												{{-- <input name="is_thumbnail" type="radio" id="radio-{{$imageName}}" value="{{$imageName}}" class="radio-col-blue" {{old('is_thumbnail') == $imageName?" checked ":""}} ><label for="radio-{{$imageName}}">Set as Thumbnail</label> --}}
												<img class="img-responsive" src="{{url(App\Models\Property::IMAGE_LOCATION)."/".$imageName}}"></span></div>
												@endforeach
												@endif

												@if(isset($boat) && null != $boat->images)
												@foreach($boat->images as $image)
												<div id="image-preview-{{substr($image->file_name,0,-4)}}" class="col-lg-3 col-md-4 col-sm-6 m-t-30 sort_handle" style="min-height:100px">
													<span>
														<button type="button" style="float:right;" onclick="deleteImage('{{$image->file_name}}')" class="btn btn-xs  waves-effect btn-danger pull-right"><i class="material-icons">close</i></button>

														<img class="img-responsive sortable_image" style="width:100%" src="{{$boat->imageUrl($image->file_name)}}">
													</span>
												</div>
												@endforeach
												@endif
											</div>

										</div>
									</div>


									<input type="hidden" name="menu" value="{{$menu or 'boats'}}">

									<div class="col-sm-12">
										<div class="form-group">
											<div class="">
												<input type="submit" id="saveButton" name="save" value="Save" class="btn btn-lg btn-success waves-effect" >
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




			@section('scripts')
			@parent

			<!-- Bootstrap Select Css -->
			<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
			<!-- Select Plugin Js -->
			<script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>



			<script type="text/javascript">
				window.onload = function () {
					var fileUpload = document.getElementById("fileupload");

					fileUpload.onchange = function () {
						if (typeof (FileReader) != "undefined") {
							var dvPreview = $("#result");
							dvPreview.innerHTML = "";
							var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
							for (var i = 0; i < fileUpload.files.length; i++) {
								var file = fileUpload.files[i];

								var image = new Image();
								image.onload = function() {
									if (!file.width) {
										alert("");
									}
								};

					
					if (regex.test(file.name.toLowerCase())) {

						var reader = new FileReader();
						reader.onload = function (e) {

							var img = '<div class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:100px"><span><a href="#" class="btn btn-xs  waves-effect btn-danger pull-right remove_pict"><i class="material-icons">close</i></a><img class="img-responsive" src="' +  e.target.result + '"></span></div>';


							dvPreview.append(img);
                        // dvPreview.appendChild(textbox);
                    }
                    reader.readAsDataURL(file);
                } else {
                	alert(file.name + " is not a valid image file.");
                	dvPreview.innerHTML = "";
                	return false;
                }
            }
        } else {
        	alert("This browser does not support HTML5 FileReader.");
        }
    }
};


$("#result").on( "click",".remove_pict",function(){
	$(this).parent().parent().remove();
    // $('#fileupload').val("");
});
</script>

@if(isset($boat))
<!-- jquery sortable Plugin Css -->
<link href="{{url('md/plugins/jquery-sortable/jquery-sortable.min.css')}}" rel="stylesheet">
<!-- Jquery sortable Plugin Js -->
<script src="{{url('md/plugins/jquery-sortable/jquery-sortable.min.js')}}"></script>
<script type="text/javascript">
	$(".connectedSortable").sortable({
		connectWith: ".connectedSortable",
		revert: 200,
		handle: ".sortable_image",
		zIndex: 999999
	});
	$(".connectedSortable .sortable_image").css("cursor", "move");
	$(".connectedSortable").on( "sortupdate", function( event, ui,i ) {
		var order = $(this).sortable("serialize",{key:'sort[]'})+ '&boatId={{$boat->id}}';;
		$.post("{{url('admin/boats/image/sort')}}", order);
	});
</script>
@endif

<script type="text/javascript">
	var deleteImage = function(filename){
		if(!confirm('Are you sure to delete the image?')){
			return;
		}
		$.ajax({
			url: "{{ url('admin/boats/image')}}",
			type: 'DELETE',
			data:{filename:filename},
			success: function(){
				$('#image-input-'+filename.slice(0,-4)).remove();
				$('#image-preview-'+filename.slice(0,-4)).remove();
			},
			error: function(){
				alert('failed');
			}
		});
	}
</script>

@endsection
