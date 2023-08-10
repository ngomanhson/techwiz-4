<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

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

    public function postRegister(Request $request) {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email",
            "password" => "required|min:8",
        ], [
            "required" => "Please enter full information.",
            "min" => "Please enter at least :min characters.",
            "email" => "Please enter a valid email address.",
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $request->password,
            'email' => $request->email,
            'level' => Constant::user_level_client,
        ];

//        dd($data);

        $this->userService->create($data);

        return redirect('account/login')->with('success', 'Register Success! Please login.');
    }

    public function myAccount() {
        return view("front.account.index");
    }
}
