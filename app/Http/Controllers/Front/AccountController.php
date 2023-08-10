<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function login() {
        return view("front.account.login");
    }

    public function logout() {
        Auth::logout();

        return back();
    }

    public function register() {
        return view("front.account.register");
    }
}
