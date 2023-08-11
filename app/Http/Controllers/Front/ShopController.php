<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productCategoryService;
    public function __construct(ProductServiceInterface $productService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService =$productService;
        $this->productCategoryService=$productCategoryService;
    }

    public function index(Request $request)
    {
        $category = $this->productCategoryService->all();
        $product = $this->productService->getProductOnIndex($request);
        return view('front.shop.show',compact('category','product'));
    }
    public function category($categoryName,Request $request)
    {
        $category = $this->productCategoryService->all();
        $product = $this->productService->getProductByCategory($categoryName,$request);

        return view('front.shop.show', compact('category','product'));
    }

    public function detail($id) {
        $product = $this->productService->find($id);
        $products_detail = ProductDetail::where('product_id', $product->id)->get();
        $pro = $this ->productService->getRelatedProducts($product);
        $title = $product->name;

        if (empty($product->productDetails)) {
            $defaultSize = null;
        } else {
            $defaultSize = $product->productDetails[0]->size ?? null;
        }

        return view('front.shop.detail', compact('product', 'pro', 'defaultSize', 'title', 'products_detail'));
    }

    public function wishlist() {
        return view('front.shop.wishlist');
    }

}
