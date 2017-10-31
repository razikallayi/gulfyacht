 @inject('Property','App\Models\Property')
 <div class="@yield('searchtype','serch-bxbt')">
  <div class="container">
   <div class="col-md-12 no-padding">
    <form action="{{url('search')}}" method="post">
      {{csrf_field()}}
      <dl class="responsive-tabs clearfix">

       {{-- <dt id="ser2">Filter</dt> --}}

       @if($categoryId == 1)
       <dt id="ser2">Rent<input type="hidden" name="category" value="Rent"></dt>
       @elseif($categoryId == 2)
       <dt id="ser2">Buy<input type="hidden" name="category" value="Buy"></dt>
       @elseif($categoryId == 3)
       <dt id="ser2" style="width: 20%;">Buy<input type="hidden" name="category" value="International"></dt>
       @elseif(isset($property) && $categoryId== $property->category_id)
         <dt id="ser2">{{App\Models\Property::CATEGORIES[$property->category_id]['name']}}<input type="hidden" name="category" value="{{App\Models\Property::CATEGORIES[$property->category_id]['name']}}"></dt>
       @else
          <dt id="ser2">Filter<input type="hidden" name="category" value="Filter"></dt>
       @endif


       <dd>
        <div class="@yield('searchwidth','container')">
          <div class="col-md-12 clearfix animated fadeIn">
            <div class="row">
              <div class="col-md-10">
                <div class="row">

            {{--  @if($categoryId != 3)
                 <div class="col-md-4 clearfix">
                   <select class="wide clearfix disabled" name="category" disabled="disabled">
                     @if($categoryId == 1)
                     <option selected>Rent</option>
                     @elseif($categoryId == 2)
                     <option selected>Buy</option>
                     @else
                     <option value="">Category</option>
                     @foreach(App\Models\Property::CATEGORIES as $category)
                     @continue($category['id'] == 3)
                     @if(request()->category == $category['name'])
                     <option selected>{{$category['name']}}</option>
                     @else
                     <option>{{$category['name']}}</option>
                     @endif
                     @endforeach
                     @endif

                  </select>
                </div>
                @endif --}}


                {{-- select options here --}}

                @if($categoryId != '1' && $categoryId != '2' && $categoryId != '3')
                <div class="col-md-3 clearfix">
                 <select class="wide clearfix disabled" name="category" disabled="disabled">
                   <option value="">Category</option>
                   @foreach(App\Models\Property::CATEGORIES as $category)
                   @continue($category['id'] == 3)
                   @if(request()->category == $category['name'])
                   <option selected>{{$category['name']}}</option>
                   @else
                   <option>{{$category['name']}}</option>
                   @endif
                   @endforeach
                 </select>
               </div>
               @endif


               @if($categoryId != '1' && $categoryId != '2' && $categoryId != '3')
                <div class="col-md-3 clearfix">
                @else
                <div class="col-md-4 clearfix">
                @endif
                   <select class="wide clearfix" name="type">
                    <option value="">Property Type</option>
                    @inject('PropertyType','App\Models\PropertyType')
                    @foreach($PropertyType::where('is_published',true)
                      ->orderBy('name')
                      ->get() as $propertyType)
                      @if(request()->type == $propertyType->name)
                      <option selected>{{$propertyType->name}}</option>
                      @else
                      <option>{{$propertyType->name}}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>

             {{-- @if($categoryId == 3) --}}
             @if($categoryId != '1' && $categoryId != '2' && $categoryId != '3')
              <div class="col-md-3 clearfix">
              @else
              <div class="col-md-4 clearfix">
              @endif

                @inject('Property','App\Models\Property')

                @php
                if($categoryId == '3'){
                  $Property::where('is_published',true)
                  ->where('country','!='," ")
                  ->where('country','!=','Qatar')
                  ->select('country')
                  ->distinct()
                  ->orderBy('country')
                  ->get();
                }
                else{
                  $Property::where('is_published',true)
                  ->where('country','!='," ")
                  ->select('country')
                  ->distinct()
                  ->orderBy('country')
                  ->get();
                }
                @endphp
                
               <select class="wide clearfix" name="country">
                <option value="">City</option>
                @foreach($Property as $propertyItem)
                  @if(request()->country == $propertyItem->country)
                  <option selected>{{$propertyItem->country}}</option>
                  @else
                  <option>{{$propertyItem->country}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              {{-- @endif --}}

 @inject('Property','App\Models\Property')                 
                  @if($categoryId != '1' && $categoryId != '2' && $categoryId != '3')
                   <div class="col-md-3 clearfix">
                   @else
                   <div class="col-md-4 clearfix">
                   @endif
                     <input id="LocationAutocomplete" class="nice-text" name="location" placeholder="Location" value="{{request()->location}}">
                 {{-- <select class="wide clearfix" name="location">
                  <option value="">Location</option>
                  @inject('Property','App\Models\Property')
                  @foreach($Property::where('is_published',true)
                                      ->where('city','!='," ")
                                      ->select('city')
                                      ->distinct()
                                      ->orderBy('city')
                                      ->get() as $propertyItem)
                  @if(request()->location == $propertyItem->city)
                      <option selected>{{$propertyItem->city}}</option>
                      @else
                      <option>{{$propertyItem->city}}</option>
                      @endif
                 @endforeach
               </select> --}}
             </div>

         
              
              <div class="col-md-2 clearfix">
                <input type="number" class="nice-text" name="min_price" value="{{request()->min_price}}" placeholder="Min Price">
              </div>

              <div class="col-md-2 clearfix">
                <input type="number" class="nice-text" name="max_price" value="{{request()->max_price}}" placeholder="Max Price">

              </div>

            {{-- <div class="col-md-4 clearfix">
          
             <select class="wide clearfix" name="bedroom">
              <option value="">Rooms</option>
                @foreach($Property::where('is_published',true)
                                  ->where('bedroom','!='," ")
                                  ->select('bedroom')
                                  ->distinct()
                                  ->orderBy('bedroom')
                                  ->get() as $propertyItem)
                      @if(request()->bedroom == $propertyItem->bedroom)
                      <option selected>{{$propertyItem->bedroom}}</option>
                      @else
                      <option>{{$propertyItem->bedroom}}</option>
                      @endif
            @endforeach
            </select>
          </div> --}}
          
          <div class="col-md-3 clearfix">
           <select class="wide clearfix" name="furnish">
            <option value="">All</option>
            @foreach(App\Models\Property::FURNISH as $furnish)
            @if(request()->furnish == $furnish['name'])
            <option selected>{{ $furnish['name'] }}</option>
            @else
            <option>{{ $furnish['name'] }}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="col-md-2 clearfix">
          {{-- <div class="{{$categoryId==3?'col-md-4':'col-md-6'}}"> --}}
          <select class="wide clearfix" name="bedroom">
            <option value="">Rooms</option>
            @foreach($Property::where('is_published',true)
              ->where('bedroom','!='," ")
              ->select('bedroom')
              ->distinct()
              ->orderBy('bedroom')
              ->get() as $propertyItem)
              @if(request()->bedroom == $propertyItem->bedroom)
              <option selected>{{$propertyItem->bedroom}}</option>
              @else
              <option>{{$propertyItem->bedroom}}</option>
              @endif
              @endforeach
            </select>
          </div>

          <div class="col-md-3 clearfix">
              <div class="fs clearfix">
                <p>Featured</p>
                   <label class="tgl tgl-gray" >
                   <input type="checkbox" name="is_featured"  onClick="toggleCheckbox(this)"  {{request()->is_featured?" checked ":" "}}/>
                   <span>&nbsp;&nbsp;</span>
                   </label>
              </div>
          </div>

       </div>
     </div>
     <div class="col-md-2 clearfix">
      <button type="submit" class="sbx-btn"><i class="avenueicon-find"></i></button>
    </div>
    
  </div>
</div>
</div>
</dd>

</dl>
</form>
</div>
</div>
</div>

<script src="{{url('gulf/js/auto-complete.min.js')}}"></script>
<script>
  $( function() {
    new autoComplete({
      selector: 'input[name="location"]',
      minChars: 1,
      source: function(term, response){
        $.getJSON('{{url('property-locations')}}', { q: term }, function(data){
          response(data);
        });
      }
    });


toggleCheckbox = function(checkbox){
$(checkbox).prop('checked',$(checkbox).prop('checked'));
}

  });
</script>