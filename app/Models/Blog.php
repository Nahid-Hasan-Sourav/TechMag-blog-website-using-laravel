<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;



class Blog extends Model
{
    use HasFactory;
    private static $blog,$image,$directory,$extension,$imageUrl,$imageName;

    private static function getImageUrl($request){
        self::$image            =$request->file('image');
        self::$extension        =self::$image->getClientOriginalExtension();
        self::$imageName        =time().'.'.self::$extension;
        self::$directory        ='teacher-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         =self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function createNewBlogs($request){
        self::$blog = new Blog();

        self::$blog->user_id    = Session::get('user_id') ;
        self::$blog->user_name =  Session::get('user_name');
        self::$blog->user_email = Session::get('user_email');

        self::$blog->category_id= $request->category_id;
        self::$blog->blog_title=$request->blog_title;
        self::$blog->description=$request->description;
        self::$blog->image = self::getImageUrl($request);

        self::$blog->save();



    }
}
