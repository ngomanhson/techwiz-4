<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
        $reviews = ProductReview::orderBy("id", "desc")->paginate(12);
        return view('admin.review.index',['reviews' => $reviews]);
    }
}
