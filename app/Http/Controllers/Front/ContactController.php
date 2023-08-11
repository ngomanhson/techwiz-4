<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUsQuery;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('front.contact.index');
    }
    public function sendContact(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required|numeric|min:0",
            "message" => "required",
        ], [
            // thong bao gi thi thong bao
        ]);
        if (!auth()->check()) {
            return redirect('/account/login');
        }
        ContactUsQuery::create([
            "user_id" => auth()->user()->id,
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "phone" => $request->get("phone"),
            "message" => $request->get("message"),
        ]);
        return redirect()->to("/contact");
    }
}
