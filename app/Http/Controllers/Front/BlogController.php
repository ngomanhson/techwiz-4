<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        return view('front.blog.index');
    }

    public function show() {
        return view('front.blog.show');
    }
}
