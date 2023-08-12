<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function updateTotal(Request $request)
    {
        $shippingFee = $request->input('shipping_fee');
        $subtotal = str_replace(',', '', Cart::subtotal());
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $total = $subtotal + $vatAmount + $shippingFee;

        // Store the updated total in the session
        Session::put('total', $total);

        return response()->json(['total' => $total]);
    }

    public function index(Request $request)
    {
        $carts = Cart::content();
        $subtotal = str_replace(',', '', Cart::subtotal());
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $shippingFee = $request->session()->get('shipping_fee', 0);

        // Retrieve 'total' from the session or calculate it if not present
        $total = $request->session()->get('total', $subtotal + $vatAmount + $shippingFee);

        $request->session()->put('subtotal', $subtotal);
        $request->session()->put('vatAmount', $vatAmount);
        $request->session()->put('total', $total);

        return view('front.checkout.index', compact('carts', 'total', 'subtotal', 'vatAmount', 'shippingFee'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "country" => "required",
            "street_address" => "required",
            "town_city" => "required",
            "phone" => "required|min:10|max:20",
            "email" => "required|email",
        ], [
            "required" => "Please enter full information",
            "min" => "Please enter at least :min",
            "max" => "Please do not enter a value exceeding :max"
        ]);

        // Get cart items
        $carts = Cart::content();
        $subtotal = str_replace(',', '', Cart::subtotal());
        $vatRate = 0.1;
        $vatAmount = $subtotal * $vatRate;
        $shippingFee = $request->session()->get('shipping_fee', 0);
//        dd($shippingFee);
        $total = $request->session()->get('total', $subtotal + $vatAmount + $shippingFee);

//        dd($total);

        $orderCode = Str::random(8);

        // Check if the number of products is enough to buy or not
        $canProceed = true;
        $insufficientProducts = [];

        foreach ($carts as $cart) {
            $product = Product::find($cart->id);
            if ($product) {
                if ($cart->qty > $product->qty) {
                    $canProceed = false;
                    $insufficientProducts[] = [
                        'name' => $product->name,
                        'requested_qty' => $cart->qty,
                        'available_qty' => $product->qty,
                    ];
                }
            }
        }

        if (!$canProceed) {
            $errorMessage = "The following products are not in stock: ";
            foreach ($insufficientProducts as $item) {
                $errorMessage .= "{$item['name']} (Requested: {$item['requested_qty']}, Available: {$item['available_qty']}), ";
            }
            $errorMessage = rtrim($errorMessage, ', ');

            return back()->with('error', $errorMessage);
        } else {
            $order = Order::create([
                "first_name" => $request->input("first_name"),
                "last_name" => $request->input("last_name"),
                "company_name" => $request->input("company_name"),
                "country" => $request->input("country"),
                "street_address" => $request->input("street_address"),
                "town_city" => $request->input("town_city"),
                "postcode_zip" => $request->input("postcode_zip"),
                "phone" => $request->input("phone"),
                "email" => $request->input("email"),
                "message" => $request->input("message"),
                "total" => $total,
                "order_code" => $orderCode,
                "payment_method" => $request->get("payment_method"),
                "shipping_method" => $request->get("shipping_method"),
                "user_id" => $request->input("user_id"),
                //  "is_paid"=>false,
                //   "status"=>0,
            ]);

            // Create order details
            foreach ($carts as $cart) {
                $data = [
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'qty' => $cart->qty,
                    'size' => $cart->size,
                    'amount' => $cart->price,
                    'total' => $cart->qty * $cart->price,
//                    'is_reviewed' => $cart->is_reviewd,
                ];

                $this->orderDetailService->create($data);
            }

//             Update product quantities
            foreach ($carts as $cart) {
                $product = Product::find($cart->id);
                if ($product) {
                    $product->qty -= $cart->qty;
                    if ($product->qty < 0) {
                        $product->qty = 0;
                    }
                    $product->save();
                }
            }
        }

        // Clear the cart
        Cart::destroy();

        if ($order->payment_method == "PayPal") {
            //Payment Method PayPal
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction', ["order" => $order->id]),
                    "cancel_url" => route('cancelTransaction', ["order" => $order->id]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => number_format($total, 2, ".", "")
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
            }
        } elseif ($order->payment_method == "VnPay") {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://sixidiots-techwiz4-hn.azurewebsites.net/checkout/nhan-ket-qua/".$order->id;
            $vnp_TmnCode = "YNSXI5ZN";//Mã website tại VNPA
            $vnp_HashSecret = "GKSNDWHVYQOWDPQQLHTQJCPQQVGUMIQL"; //Chuỗi bí mật

            $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Noi dung thanh toan';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $total * 2300000;
            $vnp_Locale = 'VN';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query; // gheps
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash; // ghép tghanhf 1 url để đi sang vnpay
            }
            header("Location: ".$vnp_Url);// đi sang bên vnpay
            die();// xong việc của việc gửi thông tin thanh toán
        }

        // Send Email
        $this->sendEmail($request ,$order);
        return redirect("/checkout/thank-you/")->with("notification","Success! You have successfully paid for your order. Please check your email.");
    }

    public function nhanKetQua(Order $order,Request $request)
    {
        if ($request->get("vnp_ResponseCode") == "00") {
            $order->update(["is_paid" => true, "status" => 1]);// đã thanh toán, trạng thái về xác nhận
            return redirect("/checkout/thank-you/")->with("notification","Success! You have successfully paid for your order. Please check your email.");
        }
        return redirect("/checkout/thank-you/")->with("notification","Success! You have successfully paid for your order. Please check your email.");
    }

    //PayPal
    public function successTransaction(Order $order, Request $request){
        $order->update(["is_paid" => true, "status" => 1]);

        $this->sendEmail($request , $order);

        return redirect("/checkout/thank-you/")->with("notification","Success! You have successfully paid for your order. Please check your email.");
    }

    public function cancelTransaction(){
        return redirect("/checkout/thank-you/")->with("notification","Failed! Error during checkout");
    }

    public function thankYou(Request $request) {
        $status = $request->input('resultCode');
        $requestId = $request->input('orderId');
//        $requestId = $request->input('requestId');
        $order = Order::where('order_code', $requestId)->first();

        $notification = session("notification");

        if ($status == '0' ) {
            // Update order status
            $order->update(["is_paid" => true, "status" => 1]);

            // Send Email
            $this->sendEmail($request, $order);
        }
//        dd($request->all());
        return view("front.checkout.thank-you", compact("notification"));
    }


    //Send Email
    public function sendEmail(Request $request, $order) {
        $email_to = $order->email;
        $carts = Cart::content();
//        dd($carts);

        $subtotal = $request->session()->get('subtotal', 0);
//        $vatAmount = $request->session()->get('vatAmount', 0);
//        $shippingFee = $request->session()->get('shipping_fee', 0);
        $total = $request->session()->get('total', 0);

        $request->session()->put('subtotal');
//        $request->session()->put('vatAmount');
        $request->session()->put('total');

        Mail::send("front.checkout.email", compact("order", "carts", "subtotal", "total"),
            function ($message) use ($email_to, $order) {
                $message->from('sonnmth2205010@fpt.edu.vn', 'Plant Nest');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification - #' . $order->order_code);
            }
        );
    }
}
