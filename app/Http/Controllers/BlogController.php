<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{


    private $category,$categories,$blog,$blogs;

    public function index(){
        $categories=Category::all();
        $blogs = Blog::with('category')->get();
        // return $blogs;
        // die();
        return view('dashboard.blogger.blog.index',['blogs'=>$blogs],['categories'=>$categories]);
    }




//     public function createNewBlog(Request $request){


//         Blog::createNewBlogs($request);

//         return response()->json([
//             'status'=>"success"
//         ]);


//  }

public function createNewBlog(Request $request){
    try {


        Blog::createNewBlogs($request);

        return response()->json([
            'status' => "success"
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => "error",
            'message' => $e->getMessage()
        ], 500);
    }
}

 public function manageBlog(){
     $user_id = Session::get('user_id');
     $this->blogs = Blog::where('user_id', $user_id)->get();
     $this->categories = Category::all();
     return view('dashboard.blogger.blog.manageBlog',['blogs'=>$this->blogs,'categories'=>$this->categories]);
 }

 public function editBlog($id){
     $this->blog=Blog::find($id);
     $this->categories = Category::all();
     return view('dashboard.blogger.blog.editBlog',['blog'=>$this->blog,'categories'=>$this->categories]);
 }

//  edit using ajax
 public function editBlogAjax($id){
    $blog=Blog::find($id);
    $categories = Category::all();
    // return $categories;
    // dd();

    if($blog){
        return response()->json([
            'status'=>"200",
            'data'=>$blog,
            'categories'=>$categories
        ]);
    }

    else{
        return response()->json([
            'status'=>"400"
        ]);
    }

}

 public function updateBlog(Request $request,$id){
     blog::updateNewBlog($request,$id);
     return redirect('/dashboard/manage-blog')->with('message','Blog updated successfully');
 }

 public function deleteBlog($id){
     blog::deleteBlog($id);
     return redirect('/dashboard/manage-blog')->with('message','Blog deleted successfully');
 }

}
