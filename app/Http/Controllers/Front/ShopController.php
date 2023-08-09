<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService =$productService;
    }

    public function index()
    {
        $product = $this->productService->all();
        return view('front.shop.show',compact('product'));
    }

    public function wishlist() {
        return view('front.shop.wishlist');
    }

}
