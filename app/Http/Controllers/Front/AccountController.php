<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Service\Order\OrderServiceInterface;
use App\Service\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class AccountController extends Controller
{
    private $userService;
    private $orderService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
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

    public function myAccount() {
        if (Auth::check()) {
            $userId = auth()->user()->id;
//            dd($userId);
            $customer = User::find($userId);
//            dd($customer);

//        Oder history
            $orders = $this->orderService->getOrderByUserId($userId);

            return view("front.account.index", compact('customer', 'orders'));
        } else {
            return view("front.account.login");
        }
    }

//  Update info
    public function updateInfo(Request $request) {
        $userId = auth()->user()->id;
//            dd($userId);
        $customer = User::find($userId);

        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email",
            "phone" => "required|min:10",
            "company_name" => "required",
            "street_address" => "required",
            "town_city" => "required",
            "postcode_zip" => "required",
            "country" => "required",
        ], [
            "required" => "Please enter full information.",
            "min" => "Please enter at least :min characters.",
            "email" => "Please enter a valid email address.",
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'street_address' => $request->street_address,
            'town_city' => $request->town_city,
            'postcode_zip' => $request->postcode_zip,
            'country' => $request->country,
        ];

//        dd($data);

        $customer->update($data);
        return redirect('account')->with('success', 'Successfully updated');
    }

    public function orderDetail() {
        return view('front.account.detail');
    }
}
