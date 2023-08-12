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

    public function add(Request $request)
    {
//        die("aa");
        if ($request->ajax()){
            $product = $this->productService->find($request->productId);

            $response['cart']=Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->discount  ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['content'] = Cart::content()->count();
            return $response;
        }

//        dd(Cart::content());
        return back();
    }
    public function delete(Request $request){
        if ($request->ajax()){
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();
            return $response;
        }
        return back();
    }
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = number_format(floatval(str_replace(',', '', Cart::total())), 2, '.', '');
            $response['subtotal'] = number_format(floatval(str_replace(',', '', Cart::subtotal())), 2, '.', '');

            return $response;
        }
    }
}
