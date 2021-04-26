<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){

    	$product =Product::where('status','!=','2')->get();
    	return view('admin.collection.product.index')->with('product',$product);

    }
    public function create(){

    	$subcategory = Subcategory::where('status','!=','3')->get();

    	return view('admin.collection.product.create')->with('subcategory',$subcategory);
    }
    public function store(Request $request){
    	$product =new Product();

    	$product->sub_category_id =$request->sub_category_id;
    	$product->name =$request->name;
    	$product->url =$request->url;
    	$product->small_description =$request->small_description;
    	//$product->product_image =$request->product_image;

    	if($request->hasfile('product_image'))
    	{
    		$image_file =$request->file('product_image');
    		$image_extenssion =$image_file->getClientOriginalExtension();
    		$image_filename =time() . '.' .$image_extenssion;
    		$image_file->move('uploads/products/',$image_filename);
    		$product->product_image = $image_filename;
    	}



    	$product->p_highlight_heading =$request->p_highlight_heading;
    	$product->p_highlights =$request->p_highlights;
    	$product->p_description_heading =$request->p_description_heading;
    	$product->p_description =$request->p_description;
    	$product->p_details_heading =$request->p_details_heading;
    	$product->p_details =$request->p_details;
    	$product->sale_tag =$request->sale_tag;
    	$product->original_price =$request->original_price;
    	$product->offer_price =$request->offer_price;
    	$product->quantity =$request->quantity;
    	$product->priority =$request->priority;


    	$product->new_arrival =$request->new_arrival == true ? '1' : '0';
    	$product->featur_products =$request->featur_products == true ? '1' : '0';
    	$product->popular_products =$request->popular_products == true ? '1' : '0';
    	$product->offer_products =$request->offer_products == true ? '1' : '0';
    	$product->status =$request->status == true ? '1' : '0';


    	$product->meta_title =$request->meta_title;
    	$product->meta_description =$request->meta_description;
    	$product->meta_keywords =$request->meta_keywords;


    	$product->save();
    	return redirect()->back()->with('status','Products Succesfully Added .!');
    	

    }


    public function edit($id){

    	$product =Product::find($id);
        $subcategory = Subcategory::where('status','!=','3')->get();

    	return view('admin.collection.product.edit')->with('product',$product)->with('subcategory',$subcategory);
    }


    public function update(Request $request , $id){

     $product =Product::find($id);


     $product->sub_category_id =$request->sub_category_id;
        $product->name =$request->name;
        $product->url =$request->url;
        $product->small_description =$request->small_description;
        //$product->product_image =$request->product_image;

        if($request->hasfile('product_image'))
        {
            $image_file =$request->file('product_image');
            $image_extenssion =$image_file->getClientOriginalExtension();
            $image_filename =time() . '.' .$image_extenssion;
            $image_file->move('uploads/products/',$image_filename);
            $product->product_image = $image_filename;
        }



        $product->p_highlight_heading =$request->p_highlight_heading;
        $product->p_highlights =$request->p_highlights;
        $product->p_description_heading =$request->p_description_heading;
        $product->p_description =$request->p_description;
        $product->p_details_heading =$request->p_details_heading;
        $product->p_details =$request->p_details;
        $product->sale_tag =$request->sale_tag;
        $product->original_price =$request->original_price;
        $product->offer_price =$request->offer_price;
        $product->quantity =$request->quantity;
        $product->priority =$request->priority;


        $product->new_arrival =$request->new_arrival == true ? '1' : '0';
        $product->featur_products =$request->featur_products == true ? '1' : '0';
        $product->popular_products =$request->popular_products == true ? '1' : '0';
        $product->offer_products =$request->offer_products == true ? '1' : '0';
        $product->status =$request->status == true ? '1' : '0';


        $product->meta_title =$request->meta_title;
        $product->meta_description =$request->meta_description;
        $product->meta_keywords =$request->meta_keywords;


        $product->update();
        return redirect()->back()->with('status','Products Succesfully Update .!');
     

    }


     public function delete($id){

        $product =Product::find($id);

         $product->status ='2'; //delete =3
         $product->update();
         return redirect()->back()->with('status','Product Deleted Succesfully');
    }


    public function deletedrecordes(){
          $product =Product::where('status','2')->get();
        return view('admin.collection.product.deleted')->with('product',$product);
    }

     public function restore($id){

        $group =Product::find($id);
        $group->status ="0"; //0->show  1 ->hide 2->delete
        $group->update();
        return redirect('products')->with('status', 'data Restore');
    }
}
