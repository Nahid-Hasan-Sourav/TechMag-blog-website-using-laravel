<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function login(){
        return view('signIn');
    }
}
