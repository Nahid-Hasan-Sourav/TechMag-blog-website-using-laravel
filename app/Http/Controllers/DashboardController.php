<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('blogger.dashboard.index');
    }

    public function addBlog(){
        return view('blogger.dashboard.blog.addBlog');
    }

    public function manageBlog(){
        return view('blogger.dashboard.blog.manageBlog');
    }

}
