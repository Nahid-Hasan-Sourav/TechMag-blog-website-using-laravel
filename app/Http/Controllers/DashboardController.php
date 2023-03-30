<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;
use Session;



class DashboardController extends Controller
{

    private $category,$categories,$blog,$blogs;


    public function userDashboard(){
        return view('dashboard.user.index');
    }

    public function adminDashboard(){
        return view('dashboard.admin.index');
    }

    //blogger route function start here
//    public function addBlog(){
//        return view('dashboard.blogger.addBlog');
//    }

    //this is for add blog form
    public function bloggerDashboard(){
        $this->categories = Category::all();
        return view('dashboard.blogger.index',['categories'=>$this->categories]);
    }
    //this is for create new blog
    public function createNewBlog(Request $request){

           //return $request->all();
            Blog::createNewBlogs($request);
            return back()->with('message','Blog Added Successfully');

    }

    public function manageBlog(){
        $user_id = Session::get('user_id');
        $this->blogs = Blog::where('user_id', $user_id)->get();
        $this->categories = Category::all();
        return view('dashboard.blogger.manageBlog',['blogs'=>$this->blogs,'categories'=>$this->categories]);
    }

    public function addBlogCategory(){
        return view('dashboard.blogger.addCategory');
    }

    public function addCategory(Request $request){
//        return $request->all();
        category::createNewCategory($request);
        return  back()->with('message','New  category added successfully');


    }

    public function manageCategory(){
        $this->categories = Category::all();
        return view('dashboard.blogger.manageCategory',['categories'=>$this->categories]);
    }

    public function editCategory($id){
        $this->category = Category::find($id);
        return view('dashboard.blogger.editCategory',['category'=>$this->category]);
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
