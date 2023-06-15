<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AllUser(){
        $allUser = User::where('user_role','User')->get();
        return view('dashboard.admin.AllUsers.index',['allUser'=>$allUser]);
    }
    public function AllBlogger(){
        $allBlogger=User::where('user_role','Blogger')->get();

        return view('dashboard.admin.AllBlogger.index',['allBlogger'=>$allBlogger]);
    }
}
