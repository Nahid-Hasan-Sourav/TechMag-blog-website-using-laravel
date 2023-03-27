<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class UserAuthController extends Controller
{
    //
    private $user;

    public function registration(){
        return view('signUp');
    }


    public function createUser(Request $request){
        user :: createNewUser($request);
        return redirect('/login')->with('message','Registration Completed Successfully');
    }

    public function index(){
        return view('signIn');
    }
    public function login(Request $request){
//        return $request->all();
        $this->user = User::where('email',$request->email)->first();
        if($this->user){
            if(password_verify($request->password,$this->user->password)){
                Session::put('user_id',$this->user->id);
//                Session::put('user_log','123');
                Session::put('user_name',$this->user->name);
                Session::put('user_role',$this->user->user_role);
                Session::put('user_image',$this->user->image);
                Session::put('user_email',$this->user->email);
                return redirect('/');
            }
            else{
                return back()->with('message','sorry..password is wrong');
            }
        }

        else{
            return back()->with('message','sorry..email is wrong');
        }
    }

    public function logout(){
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('user_role');
        Session::forget('user_image');
        return redirect('/');
    }
}
