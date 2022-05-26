<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $feature_produtcts = Product::where('trending','1')->take(5)->get();
        $trending_category = Category::where('popular','1')->take(5)->get();
       return view('frontend.index', compact('feature_produtcts','trending_category')); 
    }

    public function category(){
       $category=Category::where('status',0)->get();
       return view('frontend.category', compact('category')); 
    }

    public function viewcategory($slug){
        
        if(Category::where('slug', $slug)->exists())
        {
            $category=Category::where('slug', $slug)->first();
            $product= Product::where('cate_id', $category->id)->where('status',0)->get();
            return view('frontend.productview', compact('category','product'));
        }
        else{
            return redirect('/')->with('status', "Slug does not exists");
        }
    }

    public function productView($cate_slug, $prod_slug){
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {
                $product= Product::where('slug', $prod_slug)->first();
                return view('frontend.showproduct', compact('product'));
            }
            else{
                return redirect('/')->with('ststus', "The link was broken");
            }
        }
        else{
            return redirect('/')->with('ststus', "No such category found");
        }  
    }

    public function productlistAjax()
    {
        $product = Product::select('name')->where('status','0')->get();
        $data=[];
        foreach($product as $item){
            $data[]=$item['name'];
        }
        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;

        if($searched_product!="")
        {
            $product=Product::where("name","LIKE","%$searched_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else{
                return redirect()->back()->with("status", "No products matched your search");
            }
        }
        else{
            return redirect()->back();
        }
    }
}
