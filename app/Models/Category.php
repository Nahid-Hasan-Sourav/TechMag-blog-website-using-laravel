<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Category extends Model
{
    use HasFactory;
    private static $category,$image,$directory,$extension,$imageUrl,$imageName;

    private static function getImageUrl($request){
        self::$image            =$request->file('image');
        self::$extension        =self::$image->getClientOriginalExtension();
        self::$imageName        =time().'.'.self::$extension;
        self::$directory        ='teacher-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         =self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function createNewCategory($request){
        self::$category = new Category();

        self::$category->category_name    = $request->category_name ;
        self::$category->user_id    = Session::get('user_id') ;
        self::$category->user_email    = Session::get('user_email') ;
        self::$category->image    = self::getImageUrl($request);

        self::$category->save();

    }

}
