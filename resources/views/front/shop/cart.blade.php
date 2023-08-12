@extends('front.layout.master')
@section('title','Cart')
@section('body')
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Cart</h3>
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    @if(Cart::count()>0)
        <div class="shopping_cart_area mt-100">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr>
                                                <td class="product_remove"><a href="{{url('/cart')}}"><i onclick="removeCart('{{$cart->rowId}}')" class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="#"><img src="{{$cart->options->images[0]->path}}" alt=""></a></td>
                                                <td class="product_name"><a href="#">{{$cart->name}}</a></td>
                                                <td class="product-price">${{$cart->price}}</td>
                                                <td class="product_quantity">
                                                    {{--                                                        <input min="1" max="100" value="{{$cart->qty}}" type="number">--}}
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input  class="quantity-input"  type="text" value="{{$cart->qty}}" data-rowId="{{$cart->rowId}}">
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="product_total">${{str_replace(',', '', number_format($cart->price * $cart->qty, 2))}}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                        <p>Enter your coupon code if you have one.</p>
                                        <input placeholder="Coupon code" type="text">
                                        <button type="submit">Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Cart Totals</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">${{Cart::subtotal()}}</p>
                                        </div>

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">${{Cart::subtotal()}}</p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="{{url('/checkout/')}}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>
            </div>
        </div>
    @else
        <div class="shopping_cart_area mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{url("/shop")}}" title="Shopping now!"><img src="front/assets/img/empty-cart.png" width="200" alt="There are no products in the cart. Shopping now!"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center pb-5">
                                <p>There are no products in the cart. Shopping now!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--shopping cart area end -->
@endsection
