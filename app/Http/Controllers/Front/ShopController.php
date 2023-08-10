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

    public function detail($id) {
        $product = $this->productService->find($id);
        $pro = $this ->productService->getRelatedProducts($product);
        $title = $product->name;

        if (empty($product->productDetails)) {
            $defaultSize = null;
        } else {
            $defaultSize = $product->productDetails[0]->size ?? null;
        }

        return view('front.shop.detail', compact('product', 'pro', 'defaultSize', 'title'));
    }

    public function wishlist() {
        return view('front.shop.wishlist');
    }

}
