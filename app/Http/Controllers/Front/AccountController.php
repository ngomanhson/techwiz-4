<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function myAccount() {
        return view('front.account.index');
    }

    public function login() {
        return view('front.account.login');
    }

    public function register() {
        return view('front.account.register');
    }
}
