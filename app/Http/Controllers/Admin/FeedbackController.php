<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsQuery;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() {
        $feedbacks = ContactUsQuery::orderBy("id", "desc")->paginate(12);
        return view('admin.feedback.index',['feedbacks' => $feedbacks]);
    }
}
