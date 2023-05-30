<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    use HasFactory;

    private static $user,$image,$directory,$extension,$imageUrl,$imageName;

    private static function getImageUrl($request){
        self::$image            =$request->file('image');
        self::$extension        =self::$image->getClientOriginalExtension();
        self::$imageName        =time().'.'.self::$extension;
        self::$directory        ='user-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl         =self::$directory.self::$imageName;

        return self::$imageUrl;
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



}
