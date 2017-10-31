@extends('gulf.layout.master')
@section('content')

<div class="abt-tp"></div>

<div class="faq">
   <div class="container">
      <div class="col-md-12 no-padding">
        <h1>Maybe we’ve already answerd your question, <br> Here’s our FAQ</h1>

        @foreach($faqs->chunk(2) as $chunk)
        <div class="faq-sec clearfix">
          @foreach($chunk as $faq)
          <div class="col-md-6 no-padding">
            <div class="{{$loop->iteration ==1 ?' faq-mn ': 'faq-mn1'}}">
             <h4>{{$faq->question}}</h4>
             <p>{{$faq->answer}}</p>
           </div>
         </div>
         @endforeach
       </div>
       @endforeach

      </div>
   </div>
   
   
</div>

@include('gulf.layout.partials.featured')

@endsection