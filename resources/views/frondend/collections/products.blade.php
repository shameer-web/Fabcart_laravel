@extends('layouts.frondend')
@section('title')

Collections - Category - SubCategory - Products

@endsection

@section('content')


 <div class="container-fluid card card-body">
 	<div class="row">
 		<divcol-md-12>
 			<label for=""> Collections // {{ $subcategory->category->group->name }} // {{ $subcategory->category->name }} // {{ $subcategory->name }}</label>
 			
 		</div>
 		
 	</div>
 	
 </div>


  <div class="container">
    <div class="row mt-5">

      <div class="col-md-12 mb-3">
         <span class="font-weight-bold sort-font"> Sort By:</span>
         <a href="{{ URL::current() }}" class="sort-font">All</a>

         <a href="{{ URL::current()."?sort=price_asc" }}" class="sort-font">Price -Low to High</a>
         <a href="{{ URL::current()."?sort=price_desc" }}" class="sort-font">Price High to Low</a>
         <a href="{{ URL::current()."?sort=newest" }}" class="sort-font">Newest</a>
         <a href="{{ URL::current()."?sort=popularity" }}" class="sort-font">Popularity</a>
         
      </div>
      
      <div class="col-md-12 mb-3">
        
      
  	    <div class="row ">
  		
  			@foreach ($products as $item)
               {{--  <div class="col-md-3 mb-4">
                  <a href="{{ url('collection/'.$item->subcategory->category->group->url.'/'.$item->subcategory->category->url.'/'.$item->subcategory->url.'/'.$item->url) }}" class="text-center">
                	<div class="card">

                		<img src="{{ asset('uploads/products/'.$item->product_image) }}" class="w-100 " style="height: 230px" >
                		<div class="card-body bg-light">
                			
                			  <h6 class="mb-0">{{ $item->name }}</h6>
                		    
                		</div>
                		
                		
                	</div>
                  </a>
                	
                </div> --}}


                <div class="col-md-12 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="">

                             <img src="{{ asset('uploads/products/'.$item->product_image) }}" class="w-100 " style="height: 230px" >
                          </div>
                          
                        </div>


                        <div class="col-md-7 border-right border-left">

                           <a href="{{ url('collection/'.$item->subcategory->category->group->url.'/'.$item->subcategory->category->url.'/'.$item->subcategory->url.'/'.$item->url) }}" class="">
                            <h5 class="mb-2">{{ $item->name }}</h5>
                           </a>
                           <div class="">
                            <h6 class="text-dark mb-0">{{  $item->p_highlights   }} </h6>
                             
                           </div>

                          
                        </div>

                        <div class="col-md-2">
                          <div class="text-right">
                            <h6 class="font-italic text-dark badge-warning px-3 py-1">{{ $item->sale_tag }}</h6>
                            <h6 class="font-italic"><s> Rs:{{ number_format($item->original_price) }}</s></h6>
                            <h5 class="font-italic font-weight-bold"> Rs:{{ number_format($item->offer_price) }}</h5>

                            
                          </div>
                          <div class="text-right">
                            <div>
                              <a href="{{ url('collection/'.$item->subcategory->category->group->url.'/'.$item->subcategory->category->url.'/'.$item->subcategory->url.'/'.$item->url) }}" >
                              View Details
                              
                              </a>
                            </div>
                            
                          </div>
                          
                        </div>
                        
                      </div>
                      
                    </div>
                    
                  </div>
                  
                </div>
  			@endforeach
  			
  		
  		
  	    </div>
      </div>  
    </div>  
  	
  </div>

@endsection