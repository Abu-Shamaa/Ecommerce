<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function catIndex()
    {
        $category=Category::all();
        return view('admin.category.catindex', compact('category'));
    }

    public function Add()
    {
        return view('admin.category.addcat');
    }

    public function Insert(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:25|min:4',
            'slug'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $category=new Category();
        if($request->hasFile('image'));
        {
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }

        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;
        $category->status=$request->status==TRUE ? '1':'0';
        $category->popular=$request->popular==TRUE ? '1':'0';
        $category->save();
        return redirect('/categories')->with('status',"Category Added Successfully");
    }

    public function Edit ($id)
    {
        $category = Category::where('id', $id)->first();
        
        
        return view('admin.category.edit', compact('category'));
    }

    public function Update(Request $request,$id){
        $category=Category::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;

        }
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;
        $category->status=$request->status==TRUE ? '1':'0';
        $category->popular=$request->popular==TRUE ? '1':'0';
        $category->update();
        return redirect('/categories')->with('status',"Category updateded Successfully");
    }
    public function destroy($id){
        $category=Category::findorfail($id);
        if($category->image){
            $path='assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return back()->with('status',"Category deleted Successfully");
    }

}
