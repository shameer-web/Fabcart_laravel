<?php

namespace App\Http\Controllers\Frontend;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Facades\Request;


class CollectionController extends Controller
{
    //

    public function index(){
    	$group =Group::where('status','0')->get();
    	return view('frondend.collections.index')->with('group',$group);
    }


    public function groupview($group_url)
    {   
        $group =Group::where('url',$group_url)->first();
        $group_id =$group->id;
        $catogory =Category::where('group_id',$group_id)->where('status','!=','2')->where('status','0')->get();
    	return view('frondend.collections.catogory')->with('catogory',$catogory)->with('group',$group);
    }

    public function categoryview($group_url , $cate_url)
    {
    	$catogory =Category::where('url',$cate_url)->first();
    	$catogory_id =$catogory->id;

    	$subcategory = Subcategory::where('category_id',$catogory_id)->where('status','!=','2')->where('status','0')->get();
    	return view('frondend.collections.sub-catogory')->with('catogory',$catogory)->with('subcategory',$subcategory);
    }


    public function subcategoryview( $group_url , $cate_url , $subcate_url)
    {
      
    	$subcategory =Subcategory::where('url',$subcate_url)->first();
    	$subcategory_id =$subcategory->id;


        if(Request::get('sort') == 'price_asc')
        {
              
                $products =Product::where('sub_category_id',$subcategory_id)
                       ->orderBy('offer_price','asc')
                       ->where('status','!=','2')
                       ->where('status','0')
                       ->get();
        }

        elseif (Request::get('sort') == 'price_desc') 
        {
            
            $products =Product::where('sub_category_id',$subcategory_id)
                       ->orderBy('offer_price','desc')
                       ->where('status','!=','2')
                       ->where('status','0')
                       ->get();
        }


         elseif (Request::get('sort') == 'newest') 
        {
            
            $products =Product::where('sub_category_id',$subcategory_id)
                       ->orderBy('created_at','desc')
                       ->where('status','!=','2')
                       ->where('status','0')
                       ->get();
        }

         elseif (Request::get('sort') == 'popularity') 
        {
            
            $products =Product::where('sub_category_id',$subcategory_id)
                       ->where('popular_products','1')
                       ->where('status','!=','2')
                       ->where('status','0')
                       ->get();
        }


        else{
           

           $products =Product::where('sub_category_id',$subcategory_id)->where('status','!=','2')->where('status','0')->get();
        }


    	
    	return view('frondend.collections.products')->with('products',$products)->with('subcategory',$subcategory);
    }


    public function productview($group_url , $cate_url , $subcate_url , $product_url)
    {
        
       $products =Product::where('url',$product_url)->where('status','!=','2')->where('status','0')->first();
       return view('frondend.collections.products-view')
       ->with('products',$products);

    }

}
