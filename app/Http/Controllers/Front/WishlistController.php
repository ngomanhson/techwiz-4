<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index() {
        $products = session()->has("wishlist")?session()->get("wishlist"):[];
        return view('front.shop.wishlist', [
            "products" => $products
        ]);
    }
    public function addWislist(Product $product) {
        $products = session()->has("wishlist")?session()->get("wishlist"):[];
        foreach ($products as $item){
            if($item->id == $product->id){
                session(["wishlist"=>$products]);
                return redirect()->to("/wishlist");
            }
        }
        $products[] = $product;
        session(["wishlist"=>$products]);
        return redirect()->to("/wishlist");
    }
    public function deleteWislist(Product $product) {
        $products = session()->get("wishlist");

        if($products) {
            foreach ($products as $key => $item) {
                if($item->id == $product->id){
                    unset($products[$key]);
                    session(["wishlist"=>$products]);
                    break;
                }
            }
        }
        return redirect()->to("/wishlist");
    }
}
