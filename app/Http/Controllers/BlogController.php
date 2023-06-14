<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{


    private $category,$categories,$blog,$blogs;

    public function index(){
        $categories=Category::all();
        ///$blogs = Blog::with('category')->get();

        //$blogs = Blog::with('category')->paginate(5);

        $userId = session('user_id'); // Assuming 'user_id' is the session key storing the user_id

        $blogs = Blog::where('user_id', $userId)->get();
        // return $blogs;
        // die();
        return view('dashboard.blogger.blog.index',['blogs'=>$blogs],['categories'=>$categories]);
    }

    public function blogDetails($id){

        $blogDetails = Blog::find($id);

        $popularBlog=Blog::where('user_id', $blogDetails->user_id)
        ->orderBy('updated_at', 'desc')
        ->take(3)
        ->get();

        $moreBlogs = Blog::query()
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
        return view('home.blogDetails.index',
        [
            'details'=>$blogDetails,
            'popularBlog' => $popularBlog,
            'moreBlogs' =>$moreBlogs

        ]);
    }




//     public function createNewBlog(Request $request){


//         Blog::createNewBlogs($request);

//         return response()->json([
//             'status'=>"success"
//         ]);


//  }



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



 public function updateBlog(Request $request,$id){
     blog::updateNewBlog($request,$id);
     return redirect('/dashboard/manage-blog')->with('message','Blog updated successfully');
 }

 public function deleteBlog($id){
     blog::deleteBlog($id);
     return redirect('/dashboard/manage-blog')->with('message','Blog deleted successfully');
 }

 //create blog
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

// update using ajax

    //Route::post('/dashboard/ed/update/{id}',[BlogController::class,'updateBlogAjax'])->name('blog.update');
    public function updateBlogAjax(Request $request,$id){
        $update = Blog::updateNewBlogAjax($request,$id);
        $requestData = $request->all();


        if($update){
            return response()->json([
               'status'=>"200",
                'update'=>$update
            ]);
        }
        else{
            return response()->json([
                'status'=>"400"
            ]);
        }
    }


    public function fetureStatusUpdate($blogId){
        $blog = Blog::find($blogId);
        if ($blog) {
        $newStatus = ($blog->features_status === 'active') ? 'inactive' : 'active';

        // Update the latest_status column
        $blog->features_status = $newStatus;
        $blog->save();

        return response()->json([
            'status' => 'success',
            'data' => ['status' => $newStatus]
          ]);
        }

         // Return an error response if the blog record was not found
        return response()->json([
            'status' => 'error',
            'message' => 'Blog record not found.'
        ], 404);

    }


    public function bloggerProfile($id){
        $userDetails =User::find($id);
        $userAllBlog=Blog::where('user_id', $id)->get();
        return view('home.bloggerprofile.index',
        [
            'userDetails' => $userDetails,
            'userAllBlog' => $userAllBlog

        ]);
    }

}
