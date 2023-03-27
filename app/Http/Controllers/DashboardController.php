<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class DashboardController extends Controller
{private $category,$categories;
    public function bloggerDashboard(){
        return view('dashboard.blogger.index');
    }

    public function userDashboard(){
        return view('dashboard.user.index');
    }

    public function adminDashboard(){
        return view('dashboard.admin.index');
    }

    //blogger route function start here
    public function addBlog(){
        return view('dashboard.blogger.addBlog');
    }

    public function manageBlog(){
        return view('dashboard.blogger.manageBlog');
    }

    public function addBlogCategory(){
        return view('dashboard.blogger.addCategory');
    }
    public function addCategory(Request $request){
//        return $request->all();
        category::createNewCategory($request);
        return  back()->with('message','New  category added successfully');


    }


}
