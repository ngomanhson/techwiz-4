@extends('front.layout.master')
@section('title', 'Checkout')
@section('body')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Checkout</h3>
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

<style>
    .equal-width-column-1 {
        width: 50%;
        float: left;
        box-sizing: border-box;
    }

    .equal-width-column {
        width: 50%;
        float: left;
        padding-left: 20px;
        box-sizing: border-box;
    }
</style>
    <!--Checkout page section-->
    <div class="Checkout_section  mt-100" id="accordion">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon"
                                aria-expanded="true">Click here to enter your code</a>

                        </h3>
                        <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                            <div class="checkout_info coupon_info">
{{--                                <form action="#">--}}
{{--                                    <input placeholder="Coupon code" type="text">--}}
{{--                                    <button type="submit">Apply coupon</button>--}}
{{--                                </form>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout_form">
                <div class="row">
                    <form action="{{url("/checkout")}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id ?? ''}}" >
                        <div class="col-lg-6 col-md-6 equal-width-column-1">
                            <h3>Billing Details</h3>
                            @if(session('error'))
                                <div class="alert alert-warning text-small">
                                    {{session('error')}}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name="first_name" value="{{Auth::user()->first_name ?? ''}}">
                                    @error("first_name")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text" name="last_name" value="{{Auth::user()->last_name ?? ''}}">
                                    @error("last_name")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" value="{{Auth::user()->company_name ?? ''}}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="country">Country <span>*</span></label>
                                    <input type="text" name="country" value="{{Auth::user()->country ?? ''}}">
                                    @error("country")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>

                                <div class="col-12 mb-20">
                                    <label>Street address <span>*</span></label>
                                    <input type="text" placeholder="Street Address" class="checkout__input__add" name="street_address" value="{{Auth::user()->street_address ?? ''}}">
                                    @error("street_address")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name="town_city" value="{{Auth::user()->town_city ?? ''}}">
                                    @error("town_city")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Postcode / ZIP <span>*</span></label>
                                    <input type="text" name="postcode_zip" value="{{Auth::user()->postcode_zip ?? ''}}">
                                    @error("postcode_zip")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone ?? ''}}">
                                    @error("phone")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address <span>*</span></label>
                                    <input type="email" name="email" value="{{Auth::user()->email ?? ''}}">
                                    @error("email")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" name="message" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label> Shipping Method <span>*</span></label>

                                    <div class="panel-default">
                                        <input id="Express" value="Express" name="shipping_method" type="radio" data-bs-target="createp_account" checked/>
                                        <label for="Express" data-bs-toggle="collapse" data-bs-target="#method1" aria-controls="method1">Express shipping method</label>
                                        <div id="method1" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>This method will be sent by GrabExpress or AhaMove and received within 24 hours of placing the order.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-default">
                                        <input id="fast" value="Fast" name="shipping_method" type="radio" data-bs-target="createp_account" />
                                        <label for="fast" data-bs-toggle="collapse" data-bs-target="#collapsedefult1" aria-controls="collapsedefult1">Fast</label>
                                        <div id="collapsedefult1" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>This method will be sent by SPX or J&T Express and received within 2 to 5 days of placing the order.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 equal-width-column order-md-2">
                                <h3>Your order</h3>
                                <div class="order_table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $item)
                                            <tr>
                                                <td> {{ $item->name }} <strong> × {{ $item->qty }}</strong></td>
                                                <td> ${{number_format($item->price * $item->qty, 2, '.', '')}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Cart Subtotal</th>
                                                <td id="subtotal">${{$subtotal}}</td>
                                            </tr>
                                            <tr>
                                                <th>VAT (10%)</th>
                                                <td id="vatAmount"><strong>${{number_format($vatAmount, 2, '.', '') }}</strong></td>
                                            </tr>
                                            <tr class="order_total">
                                                <th>Order Total</th>
                                                <td id="total"><strong>${{number_format($total, 2, '.', '') }}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment_method">
                                    <div class="panel-default">
                                        <input id="payment" value="COD" name="payment_method" type="radio" data-bs-target="createp_account" checked/>
                                        <label for="payment" data-bs-toggle="collapse" data-bs-target="#method" aria-controls="method">COD</label>
                                        <div id="method" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>This method, the buyer will only make the payment at the time of receiving the goods and the payment here is cash.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-default">
                                        <input id="paypal" value="PayPal" name="payment_method" type="radio" data-bs-target="createp_account" />
                                        <label for="paypal" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">PayPal</label>
                                        <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <p>This method you can pay your shopping bills all over the world right at the website.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                    <div class="order_button">
                                        <button type="submit">PLACE ORDER</button>
                                    </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->

    <!--brand area start-->
    <div class="brand_area brand__three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand6.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
@endsection
