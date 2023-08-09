<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function myAccount() {
        return view('front.account.index');
    }

    public function checkLogin(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ], [
            "required" => "Please enter full information"
        ]);
        $credentials =[
            'email'=> $request->email,
            'password'=> $request->password,
            'level'=> 2,
        ];

        if (Auth::attempt($credentials)) {
            return redirect("/");
        } else {
            return back()->with('notification', 'ERROR: Email or password is wrong');
        }
    }

    public function login() {
        return view('front.account.login');
    }

    public function register() {
        return view('front.account.register');
    }

    public function logout() {
        Auth::logout();

        return back();
    }
}
