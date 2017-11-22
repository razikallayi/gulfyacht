@extends('project.layout.master')

@section('content')
<div class="abt">
  <div class="container">
    <div class="col-md-12 no-padding">
      <div class="sb-tp">
        <h2>Sell Your Boat</h2>
      </div>
    </div>
  </div>
</div>
<div class="fyf">
  <div class="container">
    <div class="col-md-12 no-padding">
      <div class="fyf-sec clearfix">
        <div class="col-md-3 no-padding">
          <h2>FILL <br>
            YOUR <br>
            FORM</h2>
          <p>Mandatory fields are marked with an asterisk (*)</p>

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

        </div>
        <div class="col-md-9 no-padding">
          <form method="post" action="{{url('sell')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group clearfix">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Your Name" name="name" value="{{old('name')}}">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="E-mail *" name="email" value="{{old('email')}}">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Phone No:" name="phone" value="{{old('phone')}}">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yacht Makes & Model *" name="makes_n_model" value="{{old('makes_n_model')}}">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yacht Length *" name="length" value="{{old('length')}}">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yacht Build Year *" name="year" value="{{old('year')}}">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Location of Yacht *" name="location" value="{{old('location')}}">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yacht Condition *" name="condition" value="{{old('condition')}}">
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group input-file">
                    <span class="input-group-btn"><button class="attach-btn" type="button">&nbsp;</button></span>
                    <input type="file" class="form-control" placeholder='No Files Choosen'  name="file"/>
                   </div>
                </div>
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-12">
                <textarea class="form-control" placeholder="Remarks" name="remarks">{{old('remarks')}}</textarea>
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-12">
                <button class="fyf-btn">Send</button>
              </div>
            </div>
          </form>
        </div>
        <div class="fyf-img"><img src="images/fyf-img.png" class="img-responsive"></div>
      </div>
    </div>
  </div>
</div>

@endsection