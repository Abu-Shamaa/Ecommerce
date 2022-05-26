<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function productIndex()
    {
        $product=Product::all();
        return view('admin.product.productindex', compact('product'));
    }

    public function Addd()
    {
        $category=Category::all();
        return view('admin.product.addproduct', compact('category'));
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:25|min:4',
            'slug'=>'required',
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $product=new Product();
        if($request->hasFile('image'));
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image=$filename;
        }

        $product->cate_id=$request->cate_id;
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->original_price=$request->original_price;
        $product->selling_price=$request->selling_price;
        $product->qty=$request->qty;
        $product->tax=$request->tax;
        $product->status=$request->status==TRUE ? '1':'0';
        $product->trending=$request->trending==TRUE ? '1':'0';
        $product->save();
        return redirect('/products')->with('status',"product Added Successfully");
    }

    public function EditP($id){
        $product = Product::findorfail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function UpdateP(Request $request,$id){
        $product=Product::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image=$filename;

        }

        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->original_price=$request->original_price;
        $product->selling_price=$request->selling_price;
        $product->qty=$request->qty;
        $product->tax=$request->tax;
        $product->status=$request->status==TRUE ? '1':'0';
        $product->trending=$request->trending==TRUE ? '1':'0';
        $product->update();
        return redirect('/products')->with('status',"product updateded Successfully");
    }
    public function destroyP($id){
        $product=Product::findorfail($id);
        if($product->image){
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return back()->with('status',"product deleted Successfully");
    }
}
