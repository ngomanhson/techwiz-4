<!doctype html>
<html class="no-js" lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PlantNest</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="front/assets/css/style-price.css">
    <link rel="stylesheet" href="front/assets/css/nice-select.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="front/assets/img/favicon.ico">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="front/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="front/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="front/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="front/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="front/assets/css/font.awesome.css">
    <!--animate css-->
    <link rel="stylesheet" href="front/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="front/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="front/assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="front/assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="front/assets/css/style.css">
    <!--modernizr min js here-->
    <script src="front/assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <style>
        /* Loading */
        .loader-web {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000;
            transition: opacity 0.5s, visibility 0.75s;
            z-index: 99;
        }

        .loader-web::after {
            content: "";
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            border-top: 3px solid #FFF;
            border-right: 3px solid transparent;
            box-sizing: border-box;
            animation: loading 0.5s linear infinite;
        }

        .loader-hidden {
            opacity: 0;
            visibility: hidden;
        }

        @keyframes loading {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>
<body>

<div class="pre-load">
    <div class="loader-web"></div>
</div>

{{-- Star Header Mobile--}}
<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>
                    <div class="welcome-text">
                        <p>Free Delivery: Take advantage of our time to save event</p>
                    </div>
                    <div class="language_currency text-center">
                        <ul>
                            <li class="currency"><a href="#!"> USD <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#!">EUR</a></li>
                                    <li><a href="#!">GPB</a></li>
                                    <li><a href="#!">RUP</a></li>
                                </ul>
                            </li>
                            <li class="language"><a href="#"!> English <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#!">French</a></li>
                                    <li><a href="#!">Spanish</a></li>
                                    <li><a href="#!">Russian</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="search_container">
                        <form action="/shop" method="get">
                            <div class="hover_category">
                                <select class="select_option" name="select" id="categori2">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="search_box">
                                <input placeholder="Search product..." type="text" name="search" value="{{request("search")}}">
                                <button type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="call-support">
                        <p>Call Support: <a href="tel:0123456789">0123456789</a></p>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="{{url("/")}}">Home</a>
                            </li>

{{--                            Shop Page--}}
                            <li class="menu-item-has-children">
                                <a href="{{url("/shop")}}">Shop</a>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="{{url("/blog")}}">Blog</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url("/about-us")}}">About Us </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/contact')}}"> Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="offcanvas_footer">
                        <span><a href="mailto:sixidiots@gmail.com"><i class="fa fa-envelope-o"></i> sixidiots@gmail.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#!"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#!"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#!"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#!"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#!"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End Header Mobile--}}

{{-- Star Header Computer--}}
<!--offcanvas menu area end-->
<header>
    <div class="main_header">
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="welcome-text">
                            <p>Free Delivery: Take advantage of our time to save event</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="language_currency text-right">
                            <ul>
                                <li class="currency"><a href="#!"> USD <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#!">EUR</a></li>
                                        <li><a href="#!">GPB</a></li>
                                        <li><a href="#"!>RUP</a></li>
                                    </ul>
                                </li>
                                <li class="language"><a href="#!"> English <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#!">French</a></li>
                                        <li><a href="#!">Spanish</a></li>
                                        <li><a href="#!">Russian</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-4">
                        <div class="logo">
                            <a href="{{url("/")}}"><img src="front/assets/img/logo/logo.png" alt="Plant Nest"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-6">
                        <div class="header_right_info">
                            <div class="search_container">
                                <form action="/shop" method="get">
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori1">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text" name="search" value="{{request("search")}}">
                                        <button type="submit"><i class="icon-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="header_account_area">
                                <div class="header_account-list header_wishlist">
                                    <a href="{{url('/wishlist')}}"><i class="icon-heart"></i></a>
                                </div>
                                <div class="header_account-list  mini_cart_wrapper">
                                    <a href="javascript:void(0)"><i class="icon-shopping-bag"></i><span
                                            class="item_count">{{Cart::count()}}</span></a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="cart_gallery">
                                            <div class="cart_close">
                                                <div class="cart_text">
                                                    <h3>cart</h3>
                                                </div>
                                                <div class="mini_cart_close">
                                                    <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            @foreach(Cart::content() as  $cart)
                                                <div class="cart_item" data-rowId="{{$cart->rowid}}">
                                                    <div class="cart_img">
                                                        <a href="shop/{{$cart->id}}"><img src="{{$cart->options->images[0]->path}}" alt=""></a>
                                                    </div>
                                                    <div class="cart_info">
                                                        <a href="shop/{{$cart->id}}">{{$cart->name}}</a>
                                                        <p>{{$cart->qty}} x <span> {{$cart->price}} </span></p>
                                                    </div>
{{--                                                    <div class="cart_remove">--}}
{{--                                                        <a href="#"><i class="icon-x"></i></a>--}}
{{--                                                    </div>--}}
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">{{Cart::subtotal()}}</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">{{Cart::total()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="{{url('cart/')}}"><i class="fa fa-shopping-cart"></i> View
                                                    cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a class="active" href="{{url('checkout')}}"><i class="fa fa-sign-in"></i>
                                                    Checkout</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                                <div class="header_account-list top_links">
                                    <a href="{{url("/account")}}"><i class="icon-users"></i></a>

                                    <ul class="dropdown_links">
                                        <li>
                                            @if(Auth::check())
                                                <a href="{{url("/account")}}">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</a>
                                                <a href="{{url('account')}}">My Account</a>
                                                <a href="{{url('account/logout')}}">Logout</a>
                                            @else
                                                <a href="{{url("/account/login")}}">Login</a>
                                                <a href="{{url("/account/register")}}">Register</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Categories</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="shop/category/{{$category->name}}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
{{--                                    Start Home Page--}}
                                    <li>
                                        <a href="{{url("/")}}">home</a>
                                    </li>
{{--                                    End Home Page--}}

{{--                               Star Shop Page--}}
                                    <li class="mega_items">
                                        <a href="{{url("/shop")}}">shop</a>
                                    </li>
{{--                                    End Shop Page--}}

<!-- {{--                               Star Blog Page--}} -->

                                    <li>
                                        <a href="{{url("/blog")}}">blog</a>
                                    </li>
<!--                            End Shop Page-->

                                    <li>
                                        <a href="{{url('/about-us')}}">About Us</a>
                                    </li>
                                    <li><a href="{{url('/contact')}}"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="call-support">
                            <p>Call Support: <a href="tel:0123456789">0123456789</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->
{{-- End Header Computer--}}

{{--body here--}}
@yield('body')


<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="widgets_container widget_app">
                        <div class="footer_logo">
                            <a href="/"><img src="front/assets/img/logo/logo.png" alt="Plant Nest"></a>
                        </div>
                        <div class="footer_widgetnav_menu">
                            <ul>
                                <li><a href="#!">Payment</a></li>
                                <li><a href="#!">Affiliates</a></li>
                                <li><a href="{{url('/contact')}}">Contact</a></li>
                                <li><a href="#!">Internet</a></li>
                            </ul>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer_app">
                            <ul>
                                <li><a href="#!"><img src="front/assets/img/icon/icon-app.jpg" alt="App Store"></a></li>
                                <li><a href="#!"><img src="front/assets/img/icon/icon1-app.jpg" alt="Play Store"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container contact_us">
                        <h3>Opening Time</h3>
                        <p><span>Mon - Fri:</span> 8AM - 10PM</p>
                        <p><span>Sat:</span> 9AM-8PM</p>
                        <p><span>Suns:</span> 14hPM-18hPM</p>
                        <p><b>We Work All The Holidays</b></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{url("/")}}">Home</a></li>
                                <li><a href="{{url("/shop")}}">Shop</a></li>
                                <li><a href="{{url("/about-us")}}">About Us</a></li>
                                <li><a href="{{url("/contact")}}">Contact Us</a></li>
                                <li><a href="{{url("/wishlist")}}">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{url("/account")}}">My Account</a></li>
                                <li><a href="{{url("/cart")}}">Shopping cart</a></li>
                                <li><a href="{{url("/checkout")}}">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Customer Service</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#!">Terms of use</a></li>
                                <li><a href="#!">Privacy Policy</a></li>
                                <li><a href="{{url("/contact")}}">Site Map</a></li>
                                <li><a href="#!">Returns</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p class="copyright-text">&copy; 2023 <a href="index.html">Plant Nest</a>. Made with <i
                                class="fa fa-heart text-danger"></i> by <a href="/" target="_blank">Six Idiots</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment">
                        <a href="#!"><img src="front/assets/img/icon/payment.png" alt="Payment methods"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!--jquery min js-->
<script src="front/assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="front/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="front/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="front/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="front/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="front/assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="front/assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="front/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="front/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="front/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="front/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="front/assets/js/slinky.menu.js"></script>
<!-- Plugins JS -->
<script src="front/assets/js/plugins.js"></script>
<script src="front/assets/js/jquery.slicknav.js"></script>
<script src="front/assets/js/jquery-ui.min.js"></script>

<!-- Main JS -->
<script src="front/assets/js/main.js"></script>

<!--Shipping -->
<script src="front/assets/js/shipping.js"></script>

</body>
</html>
