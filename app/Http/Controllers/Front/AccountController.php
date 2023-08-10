<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function login() {
        return view("front.account.login");
    }

    public function checkLogin(Request $request) {
    $request->validate([
        "email" => "required|email",
        "password" => "required|min:8",

    ], [
        "required" => "Please enter full information.",
        "min"=>"Please enter at least :min characters.",
        "email" => "Please enter a valid email address.",
    ]);

    $credentials =[
        'email'=> $request->email,
        'password'=> $request->password,
        'level'=> Constant::user_level_client,
    ];

    if (Auth::attempt($credentials)) {
        return redirect("/");
    } else {
        return back()->with('notification', 'ERROR: Email or password is wrong');
    }
}

    public function logout() {
        Auth::logout();

        return back();
    }

    public function register() {
        return view("front.account.register");
    }
}
