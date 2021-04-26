@extends('layouts.admin')


@section('content')



  <div class="container-fluid mt-5">

  	<div class="row">
  		<div class="col-md-12">
  			<div class="card">
  				<div class="card-body">
  					<h6>
  						Collection/Edit Products
              <a href="{{ url('products') }}" class="badge bg-danger p-2 text-white float-right">Back</a>
  					</h6>
  					
  				</div>
  				
  			</div>
  			
  		</div>
  		
  	</div>


  	<div class="row mt-3">
  		<div class="col-md-12">
  			<div class="card">
  				<div class="card-body">

  					 @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Hey!</strong>{{ session('status')  }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             @endif
  				 <form action="{{ url('update-product/'.$product->id) }}" method="post" enctype="multipart/form-data">
  				 	@csrf
            @method('put')

  					

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
               <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product" role="tab" >Product</a>
            </li>
            <li class="nav-item" role="presentation">
               <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" >Description</a>
            </li>
            <li class="nav-item" role="presentation">
               <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" >SEO</a>
            </li>

             <li class="nav-item" role="presentation">
               <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" >Product Status</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="home-tab">

            <div class="row mt-3">

             

              <div class="col-md-6">
                <div class="form-group">
                  <label>Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter the Name">             
                </div>
                
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Select Sub-category( Brands)</label>
                        <select name="sub_category_id" class="form-control">

                             <option value="{{ $product->sub_category_id }}">{{ $product->subcategory->name }}</option>}
                            
                              @foreach($subcategory as $subcategory_item)

                                 <option value="{{ $subcategory_item->id }}">{{ $subcategory_item->name }}</option>
                              @endforeach
                                 
                        </select>        
                </div>
                
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Custom url(Slug)</label>
                                <input type="text" name="url" value="{{ $product->url }}" class="form-control" placeholder="Custom Url">             
                </div>
                
              </div>


              <div class="col-md-12">
                <div class="form-group">
                  <label> Small Descriptions</label>
                                <textarea row="4" id="summernote"  name="small_description"  class="form-control" placeholder="Enter the Descriptions">{{ $product->small_description }}</textarea>             
                </div>
                
              </div>


              <div class="col-md-12">
                <div class="form-group">
                  <label> Image</label>
                                <input type="file" name="product_image" class="form-control" placeholder="">  
                                <img src="{{ asset('uploads/products/'.$product->product_image) }}" width="50px" alt="">           
                </div>
                
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Sale Tag</label>
                                <input type="text" name="sale_tag" value="{{ $product->sale_tag }}" class="form-control" placeholder="Sale Tag">             
                </div>
                
              </div>



              <div class="col-md-3">
                <div class="form-group">
                  <label>Original Price</label>
                                <input type="number" name="original_price" value="{{ $product->original_price }}" class="form-control" placeholder="Original Price">             
                </div>
                
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Offer Price</label>
                                <input type="number" name="offer_price"  value="{{ $product->offer_price }}" class="form-control" placeholder="Offer Price">             
                </div>
                
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Quantity</label>
                                <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" placeholder="Quantity">             
                </div>
                
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Priority</label>
                                <input type="number" name="priority" value="{{ $product->priority }}" class="form-control" placeholder="Priority">             
                </div>
                
              </div>


             {{--  <div class="col-md-12">
                <div class="form-group">
                  <label> Show/Hide</label>
                                <input type="checkbox" name="status">             
                </div>
                
              </div> --}}


             
              
            </div>
               
            </div>


             <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="profile-tab">
               
                <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>High Lights</label>
                      <input type="text" name="p_highlight_heading" value="{{ $product->p_highlight_heading }}"  placeholder="High Lights Heading" class="form-control">
                      <textarea name="p_highlights" id="summernote1" placeholder="Product High Lights " rows="4" class="form-control">{{ $product->p_highlights }}</textarea>
                      
                    </div>
                    
                  </div>



                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Product Descriptions</label>
                      <input type="text" name="p_description_heading" value="{{ $product->p_description_heading }}" placeholder="Product Descriptions Heading"  class="form-control">
                      <textarea name="p_description" id="summernote2" placeholder="Product Descriptions " rows="4" class="form-control">{{ $product->p_description }}</textarea>
                      
                    </div>
                    
                  </div>



                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Product Details/Specifications</label>
                      <input type="text" name="p_details_heading" value="{{ $product->p_details_heading }}" placeholder="Product Details/Specifications Heading" class="form-control">
                      <textarea name="p_details" id="summernote3" placeholder="Product Details/Specifications" rows="4" class="form-control">{{ $product->p_details }}</textarea>
                      
                    </div>
                    
                  </div>
                  
                </div>

             </div>


             <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="contact-tab">
               
                 <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Title</label>
                    
                      <textarea name="meta_title" id="summernote4" placeholder="Meta Title " rows="4" class="form-control">{{ $product->meta_title }}</textarea>
                      
                    </div>
                    
                  </div>

                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Descriptions</label>
                    
                      <textarea name="meta_description" id="summernote5" placeholder="Meta Descriptions " rows="4" class="form-control">{{ $product->meta_description }}</textarea>
                      
                    </div>
                    
                  </div>

                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Keywords</label>
                    
                      <textarea name="meta_keywords" id="summernote6" placeholder="Meta Keywords " rows="4" class="form-control">{{ $product->meta_keywords }}</textarea>
                      
                    </div>
                    
                  </div>




                </div>


             </div>

             <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="contact-tab">
                
                 <div class="row mt-3">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>New Arrivals</label>
                    
                     <input type="checkbox" name="new_arrival" {{ $product->new_arrival =='1' ? 'checked':' ' }} class="form-control">
                      
                    </div>
                    
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Featur Products</label>
                    
                     <input type="checkbox" name="featur_products"  {{ $product->featur_products =='1' ? 'checked':' ' }} class="form-control">
                      
                    </div>
                    
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Popular Products</label>
                    
                     <input type="checkbox" name="popular_products" {{ $product->popular_products =='1' ? 'checked':' ' }} class="form-control">
                      
                    </div>
                    
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Offer Products</label>
                    
                     <input type="checkbox" name="offer_products"  {{ $product->offer_products =='1' ? 'checked':' ' }} class="form-control">
                      
                    </div>
                    
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Show Hide</label>
                    
                     <input type="checkbox" name="status"  {{ $product->status =='1' ? 'checked':' ' }} class="form-control">
                      
                    </div>
                    
                  </div>







                </div>




             </div>
          </div>

                  <div class="form-group mt-3 text-right">
                  
                                <button type="submit"  class=" btn btn-primary " > UPDATE</button>              
                 </div>
                 </form>	
  				</div>
  			</div>
  		</div>
  	</div>				




  </div>
@endsection 


@section('scripts')


    <script>
      $('#summernote').summernote({
        placeholder: 'small_description',
        tabsize: 2,
        height: 100
      });
    </script>

     <script>
      $('#summernote1').summernote({
        placeholder: 'High Lights Heading',
        tabsize: 2,
        height: 100
      });
    </script>

     <script>
      $('#summernote2').summernote({
        placeholder: 'Product Descriptions',
        tabsize: 2,
        height: 100
      });
    </script>

    <script>
      $('#summernote3').summernote({
        placeholder: 'Product Details/Specifications',
        tabsize: 2,
        height: 100
      });
    </script>


    <script>
      $('#summernote4').summernote({
        placeholder: 'Meta Title',
        tabsize: 2,
        height: 100
      });
    </script>

    <script>
      $('#summernote5').summernote({
        placeholder: 'Meta Descriptions',
        tabsize: 2,
        height: 100
      });
    </script>

    <script>
      $('#summernote6').summernote({
        placeholder: 'Meta Keywords',
        tabsize: 2,
        height: 100
      });
    </script>

     

@endsection 	