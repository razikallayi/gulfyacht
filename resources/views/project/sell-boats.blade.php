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
        </div>
        <div class="col-md-9 no-padding">
          <form>
            <div class="form-group clearfix">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="E-mail *">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Phone No:">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yatch Makes & Model *">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yatch Length *">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yatch Build Year *">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Location of Yatch *">
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Yatch Condition *">
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group input-file" name="Fichier1">
                    <span class="input-group-btn"><button class="attach-btn" type="button">&nbsp;</button></span>
                    <input type="text" class="form-control" placeholder='No Files Choosen' />
                   </div>
                </div>
              </div>
            </div>
            <div class="form-group clearfix">
              <div class="col-md-12">
                <textarea class="form-control" placeholder="Remarks"></textarea>
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