<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;

class WelcomeController extends Controller
{
    public function index()
    {
        // $blogs = Blog::query()->take(5)->get();
        $blogs = Blog::query()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $fashions = Blog::where('category_id', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $features = Blog::where('features_status', 'active')
            ->take(4)
            ->get();
        $latest = Blog::where('latest_status', 'active')
            ->take(4)
            ->get();

        $texhnologies = Blog::where('category_id', 6)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $sports = Blog::where('category_id', 7)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $musics = Blog::where('category_id', 5)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();



        return view('home.index', [
            'blogs'         =>  $blogs,
            'fashions'      =>  $fashions,
            'features'      =>  $features,
            'latests'       =>  $latest,
            'technologies'  =>  $texhnologies,
            'sports'        =>  $sports,
            'musics'        =>  $musics

        ]);
    }
}
