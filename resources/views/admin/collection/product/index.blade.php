@extends('layouts.admin')


@section('content')

 



  <div class="container-fluid mt-5">

       {{-- Heading --}}

        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="#" >Collections</a>
            <span>/</span>
            <span>Products</span>

             <a href="{{ url('product-deleted-records') }}" class=" badge py-2 btn btn-primary text-white float-right ml-2">Deleted Records</a>
            <a href="{{ url('add-products') }}"  class="badge py-2 btn btn-primary text-white float-right">Add Products</a>


          </h4>

          
        </div>
       
       {{-- end Heading --}}


      <div class="row">
         <div class="col-md-12">
            @if(session('status'))
               <div class="alert alert-success" role="alert">
                            {{ session('status') }}
               </div>
            @endif
          <div class="card">
            <div class="card-body">
              <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                
                   <th>ID</th>
                   <th>Name</th>
                   <th>Product name</th>
                  {{--  <th>Descriptions</th> --}}
                    <th>Image</th>
                   <th>Show/Hide</th>
                   <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($product as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                         <td>{{ $item->name }}</td>
                         <td>{{ $item->subcategory['name'] }}</td>
                         <td>
                            <img src="{{ asset('uploads/products/'.$item->product_image) }}" width="50px" alt="">
                         </td>
                         <td>
                           <input type="checkbox"{{ $item->status =='1' ? 'checked' :'' }}>
                         </td>
                         <td>
                           <a href="{{ url('product-edit/'.$item->id) }}" class="btn btn-info badge" >Edit</a>
                            <a href="{{ url('product-delete/'.$item->id) }}" class="btn btn-danger badge" >Delete</a>
                         </td>
                      </tr>
                      @endforeach
                    </tbody>



                    
            
              </table>
              
            </div>
            
          </div>
          
         </div>
        
       </div>
  

      
       





  </div>


@endsection  