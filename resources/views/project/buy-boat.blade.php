@extends('project.layout.master')

@section('content')

<div class="buy-sec">
   <div class="container">
      <div class="col-md-12 no-padding">
        <div class="row">
           <div class="col-md-4">
        
        <div id="collapse-menu" class="collapse-container">
            <h3>Brands <span class="arrow-r"></span></h3>
            <div>
            <input type="checkbox" class="read-more-state" id="post-2" />
                <ul class="filt read-more-wrap">
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >Prestige</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Everglades</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Bayliner</label>
                    </li>
                    
                    <div class="read-more-target">
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >Prestige</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Everglades</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">Bayliner</label>
                    </li>
                    </div>
                </ul>
              <label for="post-2" class="read-more-trigger"></label>  
            </div>
            <h3>Length <span class="arrow-d"></span></h3>
            <div>
            <input type="checkbox" class="read-more-state" id="post-3" />
                <ul class="filt read-more-wrap">
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >50 Ft. - 100 Ft.</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">150 Ft. - 200 Ft.</label>
                    </li>
                   <div class="read-more-target">
                     <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox" >50 Ft. - 100 Ft.</label>
                    </li>
                    <li class="filt__item">
                    <label class="label--checkbox"><input type="checkbox" class="checkbox">150 Ft. - 200 Ft.</label>
                    </li>
                    
                   </div> 
                </ul>
                <label for="post-3" class="read-more-trigger"></label> 
            </div>
            
        </div>
        
        <div class="fby clearfix">
            <div class="col-md-12 no-padding">
                <h4>Filter By Year</h4>
                <div class="slider-labels">
            <div class="col-xs-6 caption no-padding">
            From<span id="slider-range3-value1" class="orange-color"></span>
            </div>
            <div class="col-xs-6 caption no-padding">
            To<span id="slider-range3-value2" class="orange-color"></span>
            </div>
            </div>
                <div id="slider-range3"></div>
            </div>
               
        </div>
        
        <div class="fby fbs clearfix">
            <div class="col-md-12 no-padding">
                <h4>Filter By Price</h4>
                <div class="slider-labels">
            <div class="col-xs-6 caption no-padding">
            QAR<span id="slider-range4-value1" class="orange-color"></span>
            </div>
            <div class="col-xs-6 caption no-padding">
            QAR<span id="slider-range4-value2" class="orange-color"></span>
            </div>
            </div>
             <div id="slider-range4"></div>
            </div>
               
        </div>
        
        <div class="sbbs">
          <h2>SELL / BUY BOATS ?</h2>
          <ul>
            <li><a href="tel:+974 5581 3565"> <img src="images/phn.png"> +974 5581 3565</a></li>
            <li><a href="mailto:ec@gulf-yachts.com"> <img src="images/mail.png"> ec@gulf-yachts.com</a></li>
          </ul>
          
          <div class="bs"><a href="#">BUY</a></div>
          <div class="bs"><a href="#">SELL</a></div>
          <div class="sbbs-img"><img src="images/sbbs.png"></div>
        </div>
        
        </div>
        
        
           <div class="col-md-8">
             <div class="srt">
               <div class="sel sel--black-panther">
  <select name="select-profession" id="select-profession">
    <option value="" disabled>Sort By</option>
    <option value="">Popularity</option>
    <option value="">Price--Low to High</option>
    <option value="">Price--High to Low</option>
    <option value="">Newest First</option>
  </select>
</div>

<ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">01</a></li>
    <li class="page-item"><a class="page-link" href="#">02</a></li>
    <li class="page-item"><a class="page-link" href="#">03</a></li>
    <li class="page-item"><a class="page-link" href="#">04</a></li>
    <li class="page-item"><a class="page-link" href="#">05</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
             </div>
              <div class="buy-mn">
                 <div class="row">
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever1.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever2.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever3.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever4.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever1.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever2.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever3.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever4.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever1.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                    <div class="col-md-6"><a href="details.html"><div class="buy-img"><img src="images/ever2.jpg"></div><h4>Everglades-Everglades 350 EX Power (2014)</h4><div class="ap clearfix"><div class="a">Doha - Qatar</div><div class="p">1,350, 000 QAR</div></div></a></div>
                 
                 <div class="col-md-12">
                   <div class="btm-pagi">
                     <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">01</a></li>
    <li class="page-item"><a class="page-link" href="#">02</a></li>
    <li class="page-item"><a class="page-link" href="#">03</a></li>
    <li class="page-item"><a class="page-link" href="#">04</a></li>
    <li class="page-item"><a class="page-link" href="#">05</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
                   </div>
                 </div>
                 </div>
              </div>
           </div>
        </div>
      </div>
   </div>
</div>        
        
@endsection