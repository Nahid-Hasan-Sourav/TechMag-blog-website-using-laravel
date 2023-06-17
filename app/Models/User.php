<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    use HasFactory;

    private static $user,$image,$directory,$extension,$imageUrl,$imageName;

    // private static function getImageUrl($request){
    //     self::$image            =$request->file('image');
    //     self::$extension        =self::$image->getClientOriginalExtension();
    //     self::$imageName        =time().'.'.self::$extension;
    //     self::$directory        ='user-images/';
    //     self::$image->move(self::$directory, self::$imageName);
    //     self::$imageUrl         =self::$directory.self::$imageName;

    //     return self::$imageUrl;
    // }

    private static function getImageUrl($request){

        if ($request->has('image') && $request->file('image')->isValid()){
            self::$image            =$request->file('image');
            self::$extension        =self::$image->getClientOriginalExtension();
            self::$imageName        =time().'.'.self::$extension;
            self::$directory        ='user-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl         =self::$directory.self::$imageName;
        }


        return self::$imageUrl;
    }
    private static function getImageUrlProfile($request, $inputName){
        if ($request->hasFile($inputName) && $request->file($inputName)->isValid()){
            $image = $request->file($inputName);
            $extension = $image->getClientOriginalExtension();
            $imageName = time().'.'.$extension;
            $directory = 'user-images/';
            $image->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
            return $imageUrl;
        }
        return null;
    }



    public static function createNewUser($request){
        self::$user = New User();
        self::$user->name = $request->name;
        self::$user->email =$request->email;
        self::$user->password = bcrypt($request->password);;
        self::$user->image = self::getImageUrl($request);
        self::$user->user_role = $request->user_role;

        self::$user->save();
    }


    public static function UpdateProfile($request, $id){
        $user = User::find($id);

        if ($request->file('image')){
            if (file_exists($user->image)){
                unlink($user->image);
            }
            $imageUrl = self::getImageUrlProfile($request, 'image');
        } else {
            $imageUrl = $user->image;
        }

        if ($request->file('cover_image')){
            if (file_exists($user->cover_image)){
                unlink($user->cover_image);
            }
            $coverImageUrl = self::getImageUrlProfile($request, 'cover_image');
        } else {
            $coverImageUrl = $user->cover_image;
        }

        $user->name = $request->name;
        $user->user_location = $request->user_location;
        $user->about = $request->about;

        if ($imageUrl) {
            $user->image = $imageUrl;
        }

        if ($coverImageUrl) {
            $user->cover_image = $coverImageUrl;
        }

        $user->save();

        return "success";
    }






}
