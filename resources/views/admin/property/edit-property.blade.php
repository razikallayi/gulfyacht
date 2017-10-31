@extends('admin.layout.master')

@section('active_menu','mnu-property')


@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="header bg-deep-purple">
				<h2 class="">Edit Property</h2>
			</div>
			<div class="body">
				<form id="form_validation" method="POST" action="{{url('admin/properties/'.$property->id)}}" enctype="multipart/form-data">
					{{csrf_field()}}
					{{ method_field('PUT') }}

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
							<label>Category<code>*</code></label>
							<div class="m-t-20">
								@foreach(App\Models\Property::CATEGORIES as $category)
								@php
								$checkedCategory = [];
								if($property->category_id==null){
									if($loop->first){
										$checkedCategory[$category['id']] = " checked ";
									}
								}else{
									if($category['id'] == $property->category_id){
										$checkedCategory[$category['id']] = " checked ";
									}
								}
								@endphp
								<div class="col-md-4 col-sm-12">
									<input name="category_id" type="radio" id="radio-{{$category['id']}}" value="{{$category['id']}}" class="radio-col-deep-purple" {{$checkedCategory[$category['id']] or ""}}>
									<label class="" for="radio-{{$category['id']}}">{{$category['name']}}</label>
								</div>
								@endforeach
							</div>
						</div>

{{-- <div class="col-md-6 col-sm-12">
			<label>Web ID</label>
			<div class="form-group ">
				<div class="form-line">
					<input type="text" value="{{$property->title}}" name="title" maxlength="191" class="form-control" required="">
				</div>
			</div>
		</div> --}}
		<div class="col-sm-12">
			<label>Reference ID<code>*</code></label>
			<div class="form-group ">
				<div class="form-line">
					<input type="text" value="{{$property->reference_id}}" name="reference_id" maxlength="191" class="form-control" required>
				</div>
			</div>
		</div>


		<div class="col-md-6 col-sm-12">
			<label>Title<code>*</code></label>
			<div class="form-group ">
				<div class="form-line">
					<input type="text" value="{{$property->title}}" name="title" maxlength="191" class="form-control" required="">
				</div>
			</div>
		</div>

		<div class="col-md-6 col-sm-12">
			<label>Title Arabic</label>
			<div class="form-group ">
				<div class="form-line">
					<input type="text" value="{{$property->title_ar}}" name="title_ar" class="form-control">
				</div>
			</div>
		</div>


		<div class="col-md-4 col-sm-12">
			<label>Property Type<code>*</code></label>
			<div class="form-group">
				<select name="property_type_id" required class="form-control show-tick" tabindex="-98">
					<option value="">-- Please select --</option>
					@inject('PropertyType', 'App\Models\PropertyType')
					@foreach($PropertyType->all() as $propertyType)
					@php
					$selectedProperty = [];
					if($property->property_type_id == $propertyType->id){
						$selectedProperty[$property->property_type_id] = " selected ";
					}
					@endphp

					<option value="{{$propertyType->id}}" {{$selectedProperty[$property->property_type_id] or ""}}>{{$propertyType->name}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-2 col-sm-12">
			<label>Rental Period</label>
			<div class="form-group">
				<select name="rental_period" class="form-control show-tick" tabindex="-98">
					<option {{$property->rental_period=='Monthly'? " selected ": ""}} >Monthly</option>
					<option {{$property->rental_period=='Yearly'? " selected ": ""}} >Yearly</option>
				</select>
			</div>
		</div>


		<div class="col-md-3 col-sm-12">
			<label>Price</label>
			<div class="form-group">
				<div class="form-line">
					<input type="number" value="{{$property->price}}" name="price" min="0" class="form-control">
				</div>
			</div>
		</div>

		

		<div class="col-md-3 col-sm-12">
		<label>Currency</label>
			<div class="form-group">
				<div class="form-line">
					<select name="currency" name="rental_period" class="form-control show-tick" tabindex="-98">
					</select>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-12">
			<label>Address Line 1</label>
			<div class="form-group">
				<div class="form-line">
					<input type="text" value="{{$property->address_1}}" name="address_1" maxlength="191" class="form-control">
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-12">
			<label>Address Line 2</label>
			<div class="form-group">
				<div class="form-line">
					<input type="text" value="{{$property->address_2}}" name="address_2" maxlength="191" class="form-control">
				</div>
			</div>
		</div>


		<div class="col-md-4 col-sm-12">
			<label>City</label>
			<div class="form-group">
				<div class="form-line">
					<input type="text" value="{{$property->city}}" name="city" maxlength="191" class="form-control">
				</div>
			</div>
		</div>


		<div class="col-md-4 col-sm-12">
			<label>Country</label>
			<div class="form-group">
				<div class="form-line">
					{{-- <input type="text" value="{{$property->country}}" name="country" maxlength="191" class="form-control"> --}}
					<select name="country" class="form-control show-tick" tabindex="-98">
						<option value="">-- Please select --</option>
						<option {{$property->country=='London'?'selected':''}}>London</option>
						<option {{$property->country=='New York'?'selected':''}}>New York</option>
						<option {{$property->country=='Paris'?'selected':''}}>Paris</option>
						<option {{$property->country=='Qatar'?'selected':''}}>Qatar</option>
						<option {{$property->country=='Turkey'?'selected':''}}>Turkey</option>
					</select>
				</div>
			</div>
		</div>



		<div class="col-md-2 col-sm-12">
			<label>Bedrooms</label>
			<div class="form-group">
				<div class="form-line">
					<input type="number" value="{{$property->bedroom}}" name="bedroom" id="bedroom" min="-1" class="form-control">
				</div>
			</div>
		</div>
		
		<div class="col-md-2 col-sm-12">
			<label>Studio</label>
			<div class="form-group">
				@php
				if($property->bedroom == -1){
					$checked = " checked ";
				}
				@endphp
				<input type="checkbox" id="is_studio" class="filled-in chk-col-red" {{$checked or ""}}>
				<label for="is_studio">Studio</label>
			</div>
		</div>




		<div class="col-md-4 col-sm-12">
			<label>Bathrooms</label>
			<div class="form-group">
				<div class="form-line">
					<input type="number" value="{{$property->bathroom}}" name="bathroom"  min="0" class="form-control">
				</div>
			</div>
		</div>



		<div class="col-md-4 col-sm-12">
			<label>Area</label>
			<div class="form-group">
				<div class="form-line">
					<input type="number" value="{{$property->area}}" name="area" maxlength="191" class="form-control">
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-12">
			<label>Is Furnished</label>
			<div class="form-group">
				<select name="furnished" class="form-control show-tick" tabindex="-98">
					<option value="">-- Please select --</option>
					@foreach(App\Models\Property::FURNISH as $furnish)
					@php 
					 $selected=null;
					 if($property->furnished == $furnish['id']){
					     $selected = " selected "; 
					 }
					@endphp
					<option value="{{ $furnish['id'] }}" {{$selected or ""}}>{{ $furnish['name'] }}</option>
					@endforeach
				</select>
			</div>
		</div>



		<div class="col-md-4 col-sm-12">
			<label>Contact Number</label>
			<div class="form-group">
				<div class="form-line">
					<input type="text" value="{{$property->contact_number}}" name="contact_number" maxlength="191" class="form-control">
				</div>
			</div>
		</div>



		<div class="col-md-4 col-sm-12">
			<label>Email</label>
			<div class="form-group">
				<div class="form-line">
					<input type="email" value="{{$property->email}}" name="email" maxlength="191" class="form-control">
				</div>
			</div>
		</div>




		<div class="col-md-4 col-sm-12">
			<label>Latitude</label>
			<div class="form-group">
				<div class="form-line">
					<input type="text" value="{{$property->latitude}}" name="latitude" maxlength="191" class="form-control">
				</div>
			</div>
		</div>


		<div class="col-md-4 col-sm-12">
			<label>Longitude</label>
			<div class="form-group">
				<div class="form-line">
					<input type="text" value="{{$property->longitude}}" name="longitude" maxlength="191" class="form-control">
				</div>
			</div>
		</div>



		<div class="col-md-12">
			<label>Amenities</label>
			<div class="form-group">
				@inject('Amenty', 'App\Models\Amenty')
				@foreach($Amenty->orderBy('name')->get() as $amenty)
				<div class="col-md-3 col-sm-4 m-t-10">
					@php
					$checkedAmenty = [];
					foreach($property->amenties as $propertyAmenty){
						if($propertyAmenty->id == $amenty->id){
							$checkedAmenty[$amenty->id] = " checked ";
						}
					}
					@endphp
					<input type="checkbox" name="amenty[{{$amenty->id}}]" id="amenty-{{$amenty->id}}" class="filled-in chk-col-deep-purple" {{$checkedAmenty[$amenty->id] or ""}}>
					<label for="amenty-{{$amenty->id}}">{{$amenty->name}}</label>
				</div>
				@endforeach
			</div>
		</div>



		<div class="col-md-6 col-sm-12">
			<label>Description</label>
			<div class="form-group">
				<div class="form-line">
					<textarea rows="10" name="description" class="form-control" >{{$property->description}}</textarea>
				</div>
			</div>
		</div>


		<div class="col-md-6 col-sm-12">
			<label>Description Arabic</label>
			<div class="form-group">
				<div class="form-line">
					<textarea rows="10" name="description_ar" class="form-control" >{{$property->description_ar}}</textarea>
				</div>
			</div>
		</div>

			<div class="col-sm-12">
				<div class="form-group">
					<label>Upload Images<code>*</code> </label>
					<span style="color: grey;">&nbsp; &nbsp; [ Note : Please upload images of size proportion 965 x 633 ] </span>
					<span id ="ProgressInfo"></span>
					<p id="CropSizeInfo" class="help-block"></p>
					<input id="fileupload" accept="image/*" class="col-indigo glyphicon glyphicon-picture fa-5x" name="image[]" type="file" multiple="multiple" style="max-width: 75px;
					max-height: 70px;
					overflow: hidden;
					cursor: pointer;
					font-size: 5em;"  />
					<hr/>
					<b>Preview</b><br />
				</div>
			

			<div id="result" class="connectedSortable">
				@if(null != $property->medias)
				@foreach($property->medias as $media)

				@if(null != $media->image)

				<div id="image-preview-{{substr($media->image,0,-4)}}" class="col-lg-3 col-md-4 col-sm-6 m-t-30 sort_handle" style="min-height:100px">
					<span>
						<button type="button" style="float:right;" onclick="deleteImage('{{$media->image}}')" class="btn btn-xs  waves-effect btn-danger pull-right"><i class="material-icons">close</i></button>
						
						<img class="img-responsive sortable_image" style="width:100%" src="{{url(App\Models\Property::IMAGE_LOCATION)."/".$media->image}}">
					</span>{{-- <span>fgfg</span> --}}
				</div>
				@endif
				@endforeach
				@endif
			</div>


		</div>


		<div class="col-md-4 col-sm-12">
			<label>Publish Property</label>
			<div class="form-group">
				@php
				if($property->is_published){
					$checked = " checked ";
				}
				@endphp
				<input type="checkbox" name="is_published" value="1" id="is_published" class="filled-in chk-col-blue" {{$checked or ""}}>
				<label for="is_published">Publish</label>
			</div>
		</div>


		<div class="col-md-4 col-sm-12">
			<label>Is Featured Property</label>
			<div class="form-group">
				<input type="checkbox" name="is_featured" value="1" id="is_featured" class="filled-in chk-col-blue" {{$property->is_featured?" checked ":""}}>
				<label for="is_featured">Featured Property</label>
			</div>
		</div>


		<div class="col-sm-12">
			<div class="form-group">
				<div class="">
					<input type="submit" id="saveButton" name="save" value="Save Data" class="btn btn-success waves-effect" >
				</div>
			</div>
		</div>

	</div>
</form>			
</div>
</div>

</div>

{{-- @include('admin.layout.partials.CropperModal') --}}

@endsection



@section('scripts')
@parent

<script type="text/javascript">
	var deleteImage = function(filename){
		if(!confirm('Are you sure to delete?')){
			return;
		}
		$.ajax({
			url: "{{ url('admin/properties/image')}}",
			type: 'DELETE',
			data:{location:"{{App\Models\Property::IMAGE_LOCATION}}",
			filename:filename
		},
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


<!-- Bootstrap Select Css -->
<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Select Plugin Js -->
<script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<script type="text/javascript">
// 	window.onload = function () {
// 		var fileUpload = document.getElementById("fileupload");
// 		fileUpload.onchange = function () {
// 			if (typeof (FileReader) != "undefined") {
// 				var dvPreview = document.getElementById("result");
// 				dvPreview.innerHTML = "";
// 				var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
// 				for (var i = 0; i < fileUpload.files.length; i++) {
// 					var file = fileUpload.files[i];
// 					if (regex.test(file.name.toLowerCase())) {
// 						var reader = new FileReader();
// 						reader.onload = function (e) {
// 							var img = document.createElement("IMG");
//                         //var textbox = document.createElement('input');
//                         //textbox.type = 'text';
//                        // textbox.name = 'tag_line[]';
//                       //  textbox.placeholder = 'Enter image tag line';
//                       img.height = "200";
//                       img.width = "200";
//                       img.src = e.target.result;
//                       dvPreview.appendChild(img);
//                         // dvPreview.appendChild(textbox);
//                     }
//                     reader.readAsDataURL(file);
//                 } else {
//                 	alert(file.name + " is not a valid image file.");
//                 	dvPreview.innerHTML = "";
//                 	return false;
//                 }
//             }
//         } else {
//         	alert("This browser does not support HTML5 FileReader.");
//         }
//     }
// };

</script>

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
					if (regex.test(file.name.toLowerCase())) {
						var reader = new FileReader();
						reader.onload = function (e) {
							var img = '<div class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:100px"><span><a href="#"  class="btn btn-xs  waves-effect btn-danger pull-right remove_pict"><i class="material-icons">close</i></a><img class="img-responsive" src="' +  e.target.result + '" alt="no-image"></span></div>';


							// var img = document.createElement("IMG");
							
                        //var textbox = document.createElement('input');
                        //textbox.type = 'text';
                       // textbox.name = 'tag_line[]';
                      //  textbox.placeholder = 'Enter image tag line';
                      // img.height = "200";
                      // img.width = "200";
                      // img.src = e.target.result;
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
   $('#fileupload').val("");
});
</script>

{{-- <link href="{{url('md/plugins/cropper/cropper.min.css')}}" rel="stylesheet">
<script src="{{url('md/plugins/cropper/cropper.min.js')}}"></script>
<script>
  $(function() {
    whyte={};
    whyte.imageWidth = 950;
    whyte.imageHeight = 633;
    whyte.storageLocation= "{{App\Models\Property::IMAGE_LOCATION}}";
    whyte.postUrl = "{{url('admin/properties/image')}}";

    whyte.deleteUrl = whyte.postUrl;
    whyte.hasThumbChooser = true;
    whyte.hasDeleteButton = true;
    whyte.result = $('#result');
    whyte.image = $(".featured_image > img");
    whyte.saveButton = $("#saveButton");
    whyte.imageInput =$("#ImageInput");
    whyte.cropperModal = $('#CropperModal');
    whyte.imageSizeInfo = $('#CropSizeInfo');

    var helpinfo = 'Use images of width:<b>'+whyte.imageWidth+'px</b> and height:<b>'+whyte.imageHeight+'px</b>.';
    whyte.imageSizeInfo.html(helpinfo);

    whyte.showImage = function(data){
    	var setThumb='';
    	var deleteButton = '';
    	if(whyte.hasThumbChooser){
    		setThumb = '<input name="is_thumbnail" type="radio" id="radio-'+data.filename+'" value="'+data.filename+'" class="radio-col-blue" checked><label for="radio-'+data.filename+'">Set as Thumbnail</label>';
    	}
    	if(whyte.hasDeleteButton){
    		deleteButton = '<button style="position: absolute;right:15px" type="button" onclick="whyte.deleteImage(\''+data.filename+'\')" class="btn btn-xs  waves-effect btn-danger"><i class="material-icons">close</i></button>';
    	}
    	whyte.output = '<div id="image-preview-'+data.no_extension_filename+'" class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:100px"><span>'
    		+setThumb
			+deleteButton
			+'<img class="img-responsive" style="width:100%" src="' + data.src + '"></span></div>'
    // Show
    whyte.result.append(whyte.output);

    var imageNameElement = $('<input>').attr('type','hidden')
    .attr('id','image-input-'+data.no_extension_filename)
    .attr('name','image[]')
    .attr('value',data.filename);
    whyte.result.append(imageNameElement);
}
});
</script>
<script src="{{url('md/js/whyte-cropper.js')}}"></script>
--}}

<script type="text/javascript">
	$(function() {
	  var currencies = @include('admin.layout.partials.currency');
	  var currencyDropdown = $('select[name="currency"]');
	  var options="<option value=''>-- Please select --</option>";
	  var isSelected=" ";
	  var oldCurrency;
	  @if($property->currency != null)
	  	oldCurrency = "{{$property->currency}}";
	  @endif
	  $.each(currencies.currency,function(i,currency){
	  	if(oldCurrency == currency.short){
	  		isSelected=" selected ";
	  	}else{
	  	   isSelected="";
                   if(currency.short == "QAR"){isSelected=" selected "};
	  	}
	  	options += '<option value='+currency.short+ isSelected+ '>'+currency.short+'</option>';
	  });
	
	  currencyDropdown.html(options);
	  currencyDropdown.selectpicker('refresh');
	});
</script>


<script>
	$(function(){
		var bedroomVal;
		$('#is_studio').change(function(){
			var bedroom = $('#bedroom').val();
			if(this.checked){
				bedroomVal= bedroom;
				$('#bedroom').val(-1);
			}else{
				$('#bedroom').val(bedroomVal);
			}
		});

		$('#bedroom').change(function(){
			if($('#bedroom').val()==-1){
				$('#is_studio')[0].checked =true;
			}else{
				$('#is_studio')[0].checked =false;
			}
		});
	})
</script>

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
    		var order = $(this).sortable("serialize",{key:'sort[]'})+ '&propertyId={{$property->id}}';;
    		$.post("{{url('admin/properties/image/sort')}}", order);
    	});
    </script>

<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

@endsection