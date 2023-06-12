<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Session;




class Blog extends Model
{
    use HasFactory;
    private static $blog,$image,$directory,$extension,$imageUrl,$imageName;


    public function category(){
        return $this->belongsTo(Category::class);
}

    private static function getImageUrl($request){

        if ($request->has('image') && $request->file('image')->isValid()){
            self::$image            =$request->file('image');
            self::$extension        =self::$image->getClientOriginalExtension();
            self::$imageName        =time().'.'.self::$extension;
            self::$directory        ='blog-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl         =self::$directory.self::$imageName;
        }


        return self::$imageUrl;
    }

    // public static function createNewBlogs($request){
    //     self::$blog = new Blog();

    //     self::$blog->user_id    = Session::get('user_id') ;
    //     self::$blog->user_name =  Session::get('user_name');
    //     self::$blog->user_email = Session::get('user_email');
    //     self::$blog->user_image = Session::get('user_image');

    //     self::$blog->category_id= $request->category_id;
    //     self::$blog->blog_title=$request->blog_title;
    //     self::$blog->description=$request->blog_description;
    //     self::$blog->image = self::getImageUrl($request->image);
    //     error_log(self::$blog->image);
    //     self::$blog->save();


    // }

    public static function createNewBlogs($request)
{
    self::$blog = new Blog();

    self::$blog->user_id = Session::get('user_id');
    self::$blog->user_name = Session::get('user_name');
    self::$blog->user_email = Session::get('user_email');
    self::$blog->user_image = Session::get('user_image');

    self::$blog->category_id = $request->category_id;
    self::$blog->blog_title = $request->blog_title;
    self::$blog->description = $request->blog_description;
    self::$blog->latest_status = "active";
    self::$blog->features_status ="active";
    self::$blog->image = self::getImageUrl($request);

    self::$blog->save();
}




    public static function updateNewBlog($request,$id){
        self::$blog= Blog::find($id);
        if($request->file('image')){
            if(file_exists(self::$blog->image)){
                unlink(self::$blog->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$blog->image;
        }
        self::$blog->user_id    = Session::get('user_id') ;
        self::$blog->user_name =  Session::get('user_name');
        self::$blog->user_email = Session::get('user_email');
        self::$blog->user_image = Session::get('user_image');

        self::$blog->category_id= $request->category_id;
        self::$blog->blog_title=$request->blog_title;
        self::$blog->description=$request->description;
        self::$blog->image    = self::$imageUrl;

    }

    public static function deleteBlog($id){
        self::$blog= blog::find($id);

        if(file_exists(self::$blog->image)){
            unlink(self::$blog->image);
        }
        self::$blog->delete();

    }
}
