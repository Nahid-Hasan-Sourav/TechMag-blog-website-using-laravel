<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $categories=Category::all();
        $blogs = Blog::with('category')->get();
        // return $blogs;
        // die();
        return view('dashboard.blogger.blog.index',['blogs'=>$blogs],['categories'=>$categories]);
    }
}
