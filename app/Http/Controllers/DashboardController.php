<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function bloggerDashboard(){
        return view('dashboard.blogger.index');
    }

    public function addBlog(){
        return view('dashboard.blogger.addBlog');
    }

    public function manageBlog(){
        return view('dashboard.blogger.manageBlog');
    }

    public function userDashboard(){
        return view('dashboard.user.index');
    }
    public function adminDashboard(){
        return view('dashboard.admin.index');
    }

}
