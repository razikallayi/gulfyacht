@extends('admin.layout.app')

@section('active_menu','mnu-boat')

@section('active_submenu','add')


@section('content')
<div class="row">

	<div class="col-sm-12">
		<div class="card">
			<div class="header bg-project">
				<h2 class="">@if(isset($boat)) {{"Edit"}} @else {{"Add"}}  @endif Boat </h2>
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


						@if (session()->get('message'))
						<div class="alert alert-danger">
							<ul>
								<li>{{session()->get('message')}}</li>
							</ul>
						</div>

						@endif


						<div class="row clearfix">

							<div class="col-sm-12">
								<label>Boat Type<code>*</code> </label>
								<div class="m-t-20">
									<select name="type_id"  class="form-control show-tick" required>
										@if(isset($boatTypes) != false)
										@foreach($boatTypes as $type)
											<option value="{{$type->id}}">{{$type->name}}</option>
										@endforeach
										@endif
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
										<input type="number" value="{{$boat->price or old('price')}}" name="price" maxlength="191" class="form-control" >
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
										<input type="number" value="{{$boat->year or old('year')}}" name="year" maxlength="191" class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<label>Length</label>
								<div class="form-group ">
									<div class="form-line">
										<input type="text" value="{{$boat->length or old('length')}}" name="length" maxlength="191" class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<label>Condition</label>
								<div class="form-group ">
									<div class="form-line">
										<input type="text" value="{{$boat->condition or old('condition')}}" name="condition" maxlength="191" class="form-control" >
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
								<label>Mobile</label>
								<div class="form-group ">
									<div class="form-line">
										<input type="number" value="{{$boat->mobile or old('mobile')}}" name="mobile" maxlength="191" class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<h4 class="bg-project" style="padding:10px">Specification</h4>
							</div>

							<div class="col-sm-4">
								<label>Length Overall</label>
								<div class="form-group ">
									<div class="form-line">
										<input type="text" value="{{$boat->length_overall or old('length_overall')}}" name="length_overall" maxlength="191" class="form-control" >
									</div>
								</div>
							</div>


							<div class="col-sm-4">
								<label>Beam</label>
								<div class="form-group ">
									<div class="form-line">
										<input type="text" value="{{$boat->beam or old('beam')}}" name="beam" maxlength="191" class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-sm-4">
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

			<script src="{{url('md/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

			<!-- Bootstrap Select Css -->
			<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
			<!-- Select Plugin Js -->
			<script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
      <script type="text/javascript">
   document.getElementById("logo-upload").onchange = function () {
    if (typeof (FileReader) != "undefined") {
      var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
      var file = this.files[0];
          if (regex.test(file.name.toLowerCase())) {
            var reader = new FileReader();
            reader.onload = function (e) {
              var img = e.target.result;
              $("#logo").attr("src", img);
            }
            reader.readAsDataURL(file);
          } else {
            alert(file.name + " is not a valid image file.");
  
            return false;
          }

      } else {
        alert("This browser does not support HTML5 FileReader.");
      }
    };

</script>
			<script type="text/javascript">
				function getName() {

					var fullPath = document.getElementById("fileupload").value;

					document.getElementById("imgid").innerHTML = fullPath;
				}

			</script>
			<script type="text/javascript">

				var ajaxupload = function()
				{

					$('#videoupload').append('<div id="videofiles"  ><h4>Loading... <span id="percent"></span></h4></div>');
					document.getElementById("videofile").disabled = true;
					var formData = new FormData();


					formData.append("videofile", event.target.files[0]);

					$.ajax({

						type:'POST',
						data:formData,
						dataType:'JSON',
						url : "{{url('admin/ajax_audio_upload')}}",
						async: true, 
						cache: false,
						processData:false,
						contentType:false,

						success:function(data){
							console.log(data);
							$('#videoupload').append('<input type="hidden" name="datafile" value="'+data.filename+'">');
							$('#videofile').val('');
							$('#videofile').prop('required',false);
							document.getElementById("videofile").disabled = false;
						},


						xhr: function() {
							
							var xhr = $.ajaxSettings.xhr();
							if(xhr.upload){
								xhr.upload.addEventListener('progress',progress, false);
							}
							return xhr;
						},


						error:function(){

						},
						complete:function()
						{

							$('#videofiles').remove();
							$('#videoupload').append('<div id="" ><h4>Uploaded !!!</h4></div>');
						},




					});
				}

				progress = function(e){
					if(e.lengthComputable){
						var max = e.total;
						var current = e.loaded;

						var Percentage = (current * 100)/max;
						console.log(Math.floor(Percentage));

						$('#percent').html(Math.floor(Percentage) + "%");
					}
				}


			</script>

			<script type="text/javascript">
				$.ajaxSetup({
					headers: {
						'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
					}
				});
			</script>
      <script type="text/javascript">
   document.getElementById("logo-upload").onchange = function () {
    if (typeof (FileReader) != "undefined") {
      var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
      var file = this.files[0];
          if (regex.test(file.name.toLowerCase())) {
            var reader = new FileReader();
            reader.onload = function (e) {
              var img = e.target.result;
              $("#logo").attr("src", img);
            }
            reader.readAsDataURL(file);
          } else {
            alert(file.name + " is not a valid image file.");
  
            return false;
          }

      } else {
        alert("This browser does not support HTML5 FileReader.");
      }
    };

</script>

<script type="text/javascript">
  $('#logo').on('click', function() {
    $('#logo-upload').click();
  });
</script>
<script type="text/javascript">
  function companyTypeChange (option) {
    
    if('individual'==option.value)
      {

        $('#genderColumn').css({'display':'block'});
      }
      else
        {
          $('#genderColumn').css({'display':'none'});
        }
  }
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
          //alert(file.name);
          if (regex.test(file.name.toLowerCase())) {

            var reader = new FileReader();
            reader.onload = function (e) {

              var img = '<div class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:100px"><span><a href="#fileupload" class="btn btn-xs  waves-effect btn-danger pull-right remove_pict"><i class="fa fa-close" style="color:red;font-size:20px;"></i></a><img class="img-responsive" src="' +  e.target.result + '"></span></div>';


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

          <script type="text/javascript">
            var deleteImage = function(filename){

              $.ajax({
                url: "{{ url('admin/media/delete')}}",
                type: 'DELETE',
                data:{location:"{{App\Models\Boat::IMAGE_LOCATION}}",
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

			@endsection
