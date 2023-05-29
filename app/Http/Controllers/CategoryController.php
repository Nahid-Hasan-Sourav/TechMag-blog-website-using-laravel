<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    private $category,$categories,$blog,$blogs;


    public function addBlogCategory(){
        return view('dashboard.blogger.category.addCategory');
    }

    public function addCategory(Request $request){
//        return $request->all();
        Category::createNewCategory($request);
        return  back()->with('message','New  category added successfully');


    }

    public function manageCategory(){
//        $this->categories = Category::all();
        $user_id = Session::get('user_id');
        $this->categories = Category::where('user_id', $user_id)->get();
        return view('dashboard.blogger.category.manageCategory',['categories'=>$this->categories]);
    }

    public function editCategory($id){
        $this->category = Category::find($id);
        return view('dashboard.blogger.category.editCategory',['category'=>$this->category]);
    }

    public function updateCategory(Request $request,$id){
            Category::updateNewCategory($request,$id);
        return redirect('/dashboard/manage-blog-category')->with('message','Category updated successfully');
    }

    public function deleteCategory($id){
            Category::deleteCategory($id);
            return redirect('/dashboard/manage-blog-category')->with('message','Category deleted successfully');
    }

}
