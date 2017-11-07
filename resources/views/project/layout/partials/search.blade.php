<div id="somedialog" class="dialog">
          <div class="dialog__overlay"></div>
          <div class="dialog__content">
            <div class="morph-shape" data-morph-open="M0,33.699V0c0,0,13.458,0,40.125,0C66.793,0,80,0,80,0v33.974v0.103V60c0,0-13.333,0-40,0c-26.667,0-40,0-40,0V33.699" data-morph-close="M0,33.699V0c0,0,13.208,11,39.875,11C66.543,11,80,0,80,0v33.974v0.103v13.111C80,47.188,66.667,60,40,60
  C13.333,60,0,47.062,0,47.062V33.699">
              <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
                <path d="M0,33.699V0c0,0,13.208,11,39.875,11C66.543,11,80,0,80,0v33.974v0.103v13.111C80,47.188,66.667,60,40,60
  C13.333,60,0,47.062,0,47.062V33.699"></path>
              </svg>
            </div>
            <div class="dialog-inner">
              <h2>Boats for Sale</h2>
                             <form id="searchModal" method="post" action="{{url('boats')}}">
                              {{csrf_field()}}
                               <div class="form-group clearfix">
                                    <div class="col-md-6">
                                        <select class="cs-select cs-skin-border" name="type">
                                            <option value="" disabled selected>New / Used</option>
                                            <option value="new" {{request()->type == 'new'?'selected':''}}>New</option>
                                            <option value="used" {{request()->type == 'used'?'selected':''}}>Pre Owned</option>
                                        </select>
                                    </div>
                                 <div class="col-md-6">
                                        <select class="cs-select cs-skin-border" name="brands">
                                            <option value="" disabled selected>Manufacturer</option>
                                             @foreach(App\Models\Brand::orderBy('listing_order','desc')->orderBy('updated_at','desc')->get() as $brand)
                                            <option value="{{$brand->name}}" {{request()->brands == $brand->name?'selected':''}}>{{$brand->name}}</option>
                                            @endforeach
                       
                                        </select>
                                    </div>
                               
                               </div>
                               
                               <div class="form-group clearfix">

                                <div class="col-md-4">
                                   <div class="col-md-12 no-padding">
                                     <h4>Length</h4>
                                       <div id="sliderLengthModal"></div>
                                   </div>
                                       <div class="slider-labels">
                                       <div class="col-xs-6 text-left caption no-padding">
                                       From: <span id="sliderLengthModal-lower"></span>
                                       </div>
                                       <div class="col-xs-6 text-right caption no-padding">
                                       To: <span id="sliderLengthModal-upper"></span>
                                       </div>
                                       </div>   
                                </div>
                                 <div class="col-md-4">
                                    <div class="col-md-12 no-padding">
                                      <h4>Year</h4>
                                        <div id="sliderYearModal"></div>
                                    </div>
                                        <div class="slider-labels">
                                        <div class="col-xs-6 text-left caption no-padding">
                                        From: <span id="sliderYearModal-lower"></span>
                                        </div>
                                        <div class="col-xs-6 text-right caption no-padding">
                                        To: <span id="sliderYearModal-upper"></span>
                                        </div>
                                        </div>   
                                 </div>
                                 <div class="col-md-4">
                                    <div class="col-md-12 no-padding">
                                      <h4>Price</h4>
                                        <div id="sliderPriceModal"></div>
                                    </div>
                                        <div class="slider-labels">
                                        <div class="col-xs-6 text-left caption no-padding">
                                        <span id="sliderPriceModal-lower"></span>
                                        </div>
                                        <div class="col-xs-6 text-right caption no-padding">
                                        <span id="sliderPriceModal-upper"></span>
                                        </div>
                                        </div>   
                                 </div>
                               </div>
                               <div class="form-group clearfix"><button type="submit" class="sear-btn">SEARCH </button></div>
                             </form>
                            
                            <div><button class="action" data-dialog-close>Close</button></div>
            </div>
          </div>
        </div>