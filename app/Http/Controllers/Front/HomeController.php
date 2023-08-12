<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function getRecentPosts()
    {
        $recentPosts = Blog::orderBy('created_at', 'desc')->take(5)->get();
        return $recentPosts;
    }
    public function index (){
        $products_featured = Product::orderBy("id", "desc")->limit(10)->get();
        $blogs = Blog::paginate(8);
        $recentPosts = $this->getRecentPosts();
        return view("front.index", [
            "products_featured" => $products_featured,
            "blogs"=>$blogs,
            "recentPosts" => $recentPosts,

        ]);
    }
}
