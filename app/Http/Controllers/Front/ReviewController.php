<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index (OrderDetail $orderDetail){
        $order = Order::find($orderDetail->order_id);
        if ($orderDetail->is_reviewed == false && $order->status == 4) {
            return view("front.review.index", [
                "orderDetail" => $orderDetail
            ]);
        } else {
            return abort(404);
        }

    }
    public function store(Request $request){
        // data validate
        $request->validate([
            'score'=>'required|string|max:255',
            'message'=>'required|string|max:255',
        ]);
        // data
        $score = $request->input('score');
        $message = $request->input('message');
        $orderdetail_id = $request->input('orderdetail_id');
        $orderdetail = OrderDetail::find($orderdetail_id);
        $product = Product::find($orderdetail->product_id);

        // save db
        $product_review = new ProductReview();
        $product_review->user_id = auth()->user()->id;
        $product_review->product_id = $product->id;
        $product_review->score = $score;
        $product_review->message = $message;
        $product_review->save();

        $orderdetail->is_reviewed = true;
        $orderdetail->save();

        // save rate

        $rate = 0;
        $scores = 0;
        $reviews = ProductReview::where("product_id", $orderdetail->product_id)->get();
        foreach ($reviews as $item){
            $scores += $item->score;
        }
        $rate = number_format($scores/$reviews->count(), 1);

        $product->rate = $rate;
        $product->save();
        return redirect()->to('/account/order/'.$orderdetail->order->order_code);
    }
}
