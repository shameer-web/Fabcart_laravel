@extends('layouts.frondend')
@section('title')

Collections - Category

@endsection

@section('content')


 <div class="container-fluid card card-body">
 	<div class="row">
 		<divcol-md-12>
 			<label for=""> Collections // {{ $group->name }}</label>
 			
 		</div>
 		
 	</div>
 	
 </div>


  <div class="container">
  	<div class="row mt-5">
  		
  			@foreach ($catogory as $item)
                <div class="col-md-3 mb-4">
                <a href="{{ url('collection/'.$item->group->url.'/'.$item->url) }}" class="text-center">	
                	<div class="card">

                		<img src="{{ asset('uploads/category_image/'.$item->category_image) }}" class="w-100 " style="height: 230px" >
                		<div class="card-body bg-light">
                			
                			  <h6 class="mb-0">{{ $item->name }}</h6>
                		   
                		</div>
                		
                		
                	</div>
                </a>
                	
                </div>
  			@endforeach
  			
  		
  		
  	</div>
  	
  </div>

@endsection