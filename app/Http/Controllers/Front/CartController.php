<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(){
        $carts = Cart::content();
        $subtotal = Cart::subtotal();
        $total = Cart::total();

//        dd($carts);

//        dd($cart, $subtotal, $total);

        return view('front.shop.cart', compact('carts', 'subtotal', 'total'));
    }

    public function add($id) {
        $product = $this->productService->find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->discount  ?? $product->price,
            'weight' => $product->weight ?? 0,
            'options' => [
                'images' => $product->productImages,
            ],
        ]);

//        dd(Cart::content());
        return back();
    }
}
