<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    private $userService;


    public function __construct(UserRepositoryInterface $userService)
    {
        $this->userService = $userService;
    }
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
    public function postRegister(Request $request) {

        $request->validate([
            "name"=>"required",
            "email" => "required|email",
            "password" => "required",
        ], [
            "required" => "Please enter full information"
        ]);

        $data=[
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "level"=>Constant::user_level_client,
        ];
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect("/account/register")->with('notification', 'Email already exists.')->withInput();
        }

        try {
            $this->userService->create($data);
            return redirect("/account/login")->with('success', 'Register Success! Please login.');
        } catch (\Exception $e) {
            return redirect("/account/register")->with('notification', 'An error occurred. Please try again.')->withInput();
        }
    }
    public function logout() {
        Auth::logout();

        return back();
    }
    public function orderDetail() {
        return view('front.account.detail');
    }
}
