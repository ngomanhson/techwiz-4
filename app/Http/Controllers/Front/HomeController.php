<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index (){
        $products_featured = Product::orderBy("id", "desc")->limit(10)->get();
        return view("front.index", [
            "products_featured" => $products_featured
        ]);
    }
}
