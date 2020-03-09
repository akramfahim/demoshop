<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::orderBy('created_at','DESC')->get();

        return view('category.index')->with('categories',$categories);
        
        //return view('category.index',['categories'=>$categories]);

        
    }

    public function create()
    {
        //return view ('category.addCategory');
    }

    
    public function store(Request $request)
    {
        $categoryName = $request->validate([
            'categoryName' => 'required | unique:categories'
        ]);
        $success = Category::create($categoryName);
        
        

        if($success){
            return back()->with('successMessage','Category Added Successfully');
        }

        // $category = new Category();
        // $category->categoryName = $request->categoryName;
        // $success = $category->save();

    }

    public function show(Category $category)
    {
        //
    }

    
    public function edit(Category $category)
    {
        $category = Category::find($category);

        return view('category.edit',compact('category'));

    }

    public function update(Request $request, Category $category)
    {   
        // $category =category::find($category);

        $request->validate([
            'categoryName' => 'required | unique:categories'
        ]);

         // update and save this user
         $updated = $category->update([
            'categoryName' => $request->categoryName,
        ]);

        if($updated){
            return redirect('category')->with('successMessage','Category Updated Successfully');
        }else{
            return back()->with('errorMessage','Category Can not be Deleted');
        }
    }

    
    public function destroy(Category $category)
    {
        
        $category->delete();

        return back()->with('successMessage','Category Deleted Successfully');
    }
}
