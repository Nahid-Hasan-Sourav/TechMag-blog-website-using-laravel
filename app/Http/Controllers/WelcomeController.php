<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Symfony\Component\Mime\Header\all;

class WelcomeController extends Controller
{
    public function index(){
        return view('home.index');
    }


}
