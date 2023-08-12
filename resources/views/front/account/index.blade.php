@extends('front.layout.master')
@section('title','My Account')
@section('body')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>My Account</h3>
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                                <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li>
                                <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a>
                                </li>
                                <li><a href="{{url('account/logout')}}" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                @if(session('success'))
                                    <div class="alert alert-success text-small">
                                        {{session('success')}}
                                    </div>
                                @else
                                    <h3>Dashboard </h3>
                                    <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                            orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a
                                            href="#">Edit your password and account details.</a></p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="orders">
                                @if(count($orders) > 0)
                                    <h3>Orders</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Order code</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{$order->order_code}}</td>
                                                    <td>{{$order->created_at->format('d/m/Y')}}</td>
                                                    <td>
                                                        <span class="success">
                                                            @switch($order->status)
                                                                @case(0)<span class="text text-secondary">Pending</span>@break
                                                                @case(1)<span class="text text-primary">Confirmed</span>@break
                                                                @case(2)<span class="text text-primary">Shipping</span>@break
                                                                @case(3)<span class="text text-warning">Shipped</span>@break
                                                                @case(4)<span class="text text-success">Completed</span>@break
                                                                @case(5)<span class="text text-danger">Cancel</span>@break
                                                            @endswitch
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if(isset($order->orderDetails) && count($order->orderDetails) > 0)
                                                            {{$order->orderDetails[0]->product->name}}

                                                            @php
                                                                $totalQuantity = $order->orderDetails->sum('qty');
                                                                $otherProductsCount = $totalQuantity - 1;
                                                            @endphp

                                                            @if($otherProductsCount > 0)
                                                                (and {{$otherProductsCount}} other product{{($otherProductsCount > 1) ? 's' : ''}})
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td><a href="account/order/{{$order->order_code}}">view</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 mx-auto">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <a href="{{url("/shop")}}" title="Try again!"><img src="front/assets/img/my-order.png" width="200" alt="No results were found."></a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <p>No products were found for your search.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address">Billing address</h4>
{{--                                <a href="#" class="view">Edit</a>--}}
                                <address>
                                    <span><strong>Full name: </strong>{{$customer->first_name}} {{$customer->last_name}}</span>
                                    <br>
                                    <span><strong>Email: </strong>{{$customer->email}}</span>,
                                    <br>
                                    <span><strong>Phone: </strong>{{$customer->phone}}</span>,
                                    <br>
                                    <span><strong>Company name: </strong>{{$customer->company_name}}</span>,
                                    <br>
                                    <span><strong>Street address: </strong>{{$customer->street_address}}</span>
                                    <br>
                                    <span><strong>Town city: </strong>{{$customer->town_city}}</span>
                                    <br>
                                    <span><strong>Postcode / Zip: </strong>{{$customer->postcode_zip}}</span>
                                    <br>
                                    <span><strong>Country: </strong>{{$customer->country}}</span>
                                </address>
                            </div>
                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="{{url('account/update-info')}}" method="post">
                                                @csrf
                                                <label>First Name</label>
                                                <input type="text" name="first_name" value="{{$customer->first_name}}">

                                                <label>Last Name</label>
                                                <input type="text" name="last_name" value="{{$customer->last_name}}">

                                                <label>Email</label>
                                                <input type="email" name="email" value="{{$customer->email}}">

                                                <label>Phone</label>
                                                <input type="text" name="phone" value="{{$customer->phone}}">

                                                <label>Company name</label>
                                                <input type="text" name="company_name" value="{{$customer->company_name}}">

                                                <label>Street address</label>
                                                <input type="text" name="street_address" value="{{$customer->street_address}}">

                                                <label>Town city</label>
                                                <input type="text" name="town_city" value="{{$customer->town_city}}">

                                                <label>Postcode / Zip</label>
                                                <input type="text" name="postcode_zip" value="{{$customer->postcode_zip}}">

                                                <label>Country</label>
                                                <input type="text" name="country" value="{{$customer->country}}">

                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account end   -->

    <!--brand area start-->
    <div class="brand_area brand__three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand6.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->

    <!--news letter popup start-->
    <div class="newletter-popup">
        <div id="boxes" class="newletter-container">
            <div id="dialog" class="window">
                <div id="popup2">
                    <span class="b-close"><span>close</span></span>
                </div>
                <div class="box">
                    <div class="newletter-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="box-content newleter-content">
                        <label class="newletter-label">Enter your email address to subscribe our notification of our new
                            post &amp; features by email.</label>
                        <div id="frm_subscribe">
                            <form name="subscribe" id="subscribe_popup">
                                <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail"
                                       placeholder="Enter you email address here...">
                                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                                <div id="notification"></div>
                                <a class="theme-btn-outlined"
                                   onclick="email_subscribepopup()"><span>Subscribe</span></a>
                            </form>
                            <div class="subscribe-bottom">
                                <input type="checkbox" id="newsletter_popup_dont_show_again">
                                <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                            </div>
                        </div>
                        <!-- /#frm_subscribe -->
                    </div>
                    <!-- /.box-content -->
                </div>
            </div>

        </div>
        <!-- /.box -->
    </div>
    <!--news letter popup start-->
@endsection
