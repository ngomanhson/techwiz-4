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
                            <li class="currency"><a href="#"> USD <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">GPB</a></li>
                                    <li><a href="#">RUP</a></li>
                                </ul>
                            </li>
                            <li class="language"><a href="#"> English <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Russian</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="search_container">
                        <form action="/shop" method="get">
                            <div class="hover_category">
                                <select class="select_option" name="select" id="categori2">
                                    <option selected value="1">All Categories</option>
                                    <option value="2">Accessories</option>
                                    <option value="3">Accessories & More</option>
                                    <option value="4">Butters & Eggs</option>
                                    <option value="5">Camera & Video </option>
                                    <option value="6">Mornitors</option>
                                    <option value="7">Tablets</option>
                                    <option value="8">Laptops</option>
                                    <option value="9">Handbags</option>
                                    <option value="10">Headphone & Speaker</option>
                                    <option value="11">Herbs & botanicals</option>
                                    <option value="12">Vegetables</option>
                                    <option value="13">Shop</option>
                                    <option value="14">Laptops & Desktops</option>
                                    <option value="15">Watchs</option>
                                    <option value="16">Electronic</option>
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
                        <span><a href="#"><i class="fa fa-envelope-o"></i> demo@example.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
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
                                <li class="currency"><a href="#"> USD <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">EUR</a></li>
                                        <li><a href="#">GPB</a></li>
                                        <li><a href="#">RUP</a></li>
                                    </ul>
                                </li>
                                <li class="language"><a href="#"> English <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Spanish</a></li>
                                        <li><a href="#">Russian</a></li>
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
                            <a href="{{url("/")}}"><img src="front/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-6">
                        <div class="header_right_info">
                            <div class="search_container">
                                <form action="/shop" method="get">
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori1">
                                            <option selected value="1">All Categories</option>
                                            <option value="2">Accessories</option>
                                            <option value="3">Accessories & More</option>
                                            <option value="4">Butters & Eggs</option>
                                            <option value="5">Camera & Video </option>
                                            <option value="6">Mornitors</option>
                                            <option value="7">Tablets</option>
                                            <option value="8">Laptops</option>
                                            <option value="9">Handbags</option>
                                            <option value="10">Headphone & Speaker</option>
                                            <option value="11">Herbs & botanicals</option>
                                            <option value="12">Vegetables</option>
                                            <option value="13">Shop</option>
                                            <option value="14">Laptops & Desktops</option>
                                            <option value="15">Watchs</option>
                                            <option value="16">Electronic</option>
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
                                            class="item_count">2</span></a>
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
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="front/assets/img/s-product/product.jpg"
                                                                     alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Primis In Faucibus</a>
                                                    <p>1 x <span> $65.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="front/assets/img/s-product/product2.jpg"
                                                                     alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Letraset Sheets</a>
                                                    <p>1 x <span> $60.00 </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">
                                                <div class="cart_total">
                                                    <span>Sub total:</span>
                                                    <span class="price">$125.00</span>
                                                </div>
                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">$125.00</span>
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
                                    <li class="menu_item_children"><a href="#">Brake Parts <i
                                                class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            <li class="menu_item_children"><a href="#">Dresses</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Sweater</a></li>
                                                    <li><a href="#">Evening</a></li>
                                                    <li><a href="#">Day</a></li>
                                                    <li><a href="#">Sports</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Handbags</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Shoulder</a></li>
                                                    <li><a href="#">Satchels</a></li>
                                                    <li><a href="#">kids</a></li>
                                                    <li><a href="#">coats</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">shoes</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Ankle Boots</a></li>
                                                    <li><a href="#">Clog sandals </a></li>
                                                    <li><a href="#">run</a></li>
                                                    <li><a href="#">Books</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Clothing</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Coats Jackets </a></li>
                                                    <li><a href="#">Raincoats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Wheels & Tires <i
                                                class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_3">
                                            <li class="menu_item_children"><a href="#">Chair</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Dining room</a></li>
                                                    <li><a href="#">bedroom</a></li>
                                                    <li><a href="#"> Home & Office</a></li>
                                                    <li><a href="#">living room</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Lighting</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Ceiling Lighting</a></li>
                                                    <li><a href="#">Wall Lighting</a></li>
                                                    <li><a href="#">Outdoor Lighting</a></li>
                                                    <li><a href="#">Smart Lighting</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Sofa</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Fabric Sofas</a></li>
                                                    <li><a href="#">Leather Sofas</a></li>
                                                    <li><a href="#">Corner Sofas</a></li>
                                                    <li><a href="#">Sofa Beds</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Furnitured & Decor <i
                                                class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Brake Tools</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Driveshafts</a></li>
                                                    <li><a href="#">Spools</a></li>
                                                    <li><a href="#">Diesel </a></li>
                                                    <li><a href="#">Gasoline</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Emergency Brake</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Dolls for Girls</a></li>
                                                    <li><a href="#">Girls' Learning Toys</a></li>
                                                    <li><a href="#">Arts and Crafts for Girls</a></li>
                                                    <li><a href="#">Video Games for Girls</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Turbo System <i
                                                class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Check Trousers</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Building</a></li>
                                                    <li><a href="#">Electronics</a></li>
                                                    <li><a href="#">action figures </a></li>
                                                    <li><a href="#">specialty & boutique toy</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Calculators</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="#">Dolls for Girls</a></li>
                                                    <li><a href="#">Girls' Learning Toys</a></li>
                                                    <li><a href="#">Arts and Crafts for Girls</a></li>
                                                    <li><a href="#">Video Games for Girls</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"> Lighting</a></li>
                                    <li><a href="#"> Accessories</a></li>
                                    <li><a href="#">Body Parts</a></li>
                                    <li><a href="#">Perfomance Filters</a></li>
                                    <li><a href="#"> Engine Parts</a></li>
                                    <li class="hidden"><a href="shop-left-sidebar.html">New Sofas</a></li>
                                    <li class="hidden"><a href="shop-left-sidebar.html">Sleight Sofas</a></li>
                                    <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More
                                            Categories</a></li>
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
                            <a href="index.html"><img src="front/assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="footer_widgetnav_menu">
                            <ul>
                                <li><a href="#">Payment</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="{{url('/contact')}}">Contact</a></li>
                                <li><a href="#">Internet</a></li>
                            </ul>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer_app">
                            <ul>
                                <li><a href="#"><img src="front/assets/img/icon/icon-app.jpg" alt=""></a></li>
                                <li><a href="#"><img src="front/assets/img/icon/icon1-app.jpg" alt=""></a></li>
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
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="{{url("/contact")}}">Site Map</a></li>
                                <li><a href="#">Returns</a></li>
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
                        <p class="copyright-text">&copy; 2023 <a href="index.html">PlantNest</a>. Made with <i
                                class="fa fa-heart text-danger"></i> by <a href="https://hasthemes.com/"
                                                                           target="_blank">HasThemes</a> </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment">
                        <a href="#"><img src="front/assets/img/icon/payment.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- modal area start-->
{{--<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                <span aria-hidden="true"><i class="icon-x"></i></span>--}}
{{--            </button>--}}
{{--            <div class="modal_body">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-5 col-md-5 col-sm-12">--}}
{{--                            <div class="modal_tab">--}}
{{--                                <div class="tab-content product-details-large">--}}
{{--                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">--}}
{{--                                        <div class="modal_tab_img">--}}
{{--                                            <a href="#"><img src="front/assets/img/product/productbig1.jpg" alt=""></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="tab2" role="tabpanel">--}}
{{--                                        <div class="modal_tab_img">--}}
{{--                                            <a href="#"><img src="front/assets/img/product/productbig2.jpg" alt=""></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="tab3" role="tabpanel">--}}
{{--                                        <div class="modal_tab_img">--}}
{{--                                            <a href="#"><img src="front/assets/img/product/productbig3.jpg" alt=""></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade" id="tab4" role="tabpanel">--}}
{{--                                        <div class="modal_tab_img">--}}
{{--                                            <a href="#"><img src="front/assets/img/product/productbig4.jpg" alt=""></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="modal_tab_button">--}}
{{--                                    <ul class="nav product_navactive owl-carousel" role="tablist">--}}
{{--                                        <li>--}}
{{--                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"--}}
{{--                                               aria-controls="tab1" aria-selected="false"><img--}}
{{--                                                    src="front/assets/img/product/product1.jpg" alt=""></a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"--}}
{{--                                               aria-controls="tab2" aria-selected="false"><img--}}
{{--                                                    src="front/assets/img/product/product2.jpg" alt=""></a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"--}}
{{--                                               role="tab" aria-controls="tab3" aria-selected="false"><img--}}
{{--                                                    src="front/assets/img/product/product3.jpg" alt=""></a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab"--}}
{{--                                               aria-controls="tab4" aria-selected="false"><img--}}
{{--                                                    src="front/assets/img/product/product8.jpg" alt=""></a>--}}
{{--                                        </li>--}}

{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-7 col-md-7 col-sm-12">--}}
{{--                            <div class="modal_right">--}}
{{--                                <div class="modal_title mb-10">--}}
{{--                                    <h2>Donec Ac Tempus</h2>--}}
{{--                                </div>--}}
{{--                                <div class="modal_price mb-10">--}}
{{--                                    <span class="new_price">$64.99</span>--}}
{{--                                    <span class="old_price">$78.99</span>--}}
{{--                                </div>--}}
{{--                                <div class="modal_description mb-15">--}}
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste--}}
{{--                                        laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam--}}
{{--                                        in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel--}}
{{--                                        recusandae </p>--}}
{{--                                </div>--}}
{{--                                <div class="variants_selects">--}}
{{--                                    <div class="variants_size">--}}
{{--                                        <h2>size</h2>--}}
{{--                                        <select class="select_option">--}}
{{--                                            <option selected value="1">s</option>--}}
{{--                                            <option value="1">m</option>--}}
{{--                                            <option value="1">l</option>--}}
{{--                                            <option value="1">xl</option>--}}
{{--                                            <option value="1">xxl</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="variants_color">--}}
{{--                                        <h2>color</h2>--}}
{{--                                        <select class="select_option">--}}
{{--                                            <option selected value="1">purple</option>--}}
{{--                                            <option value="1">violet</option>--}}
{{--                                            <option value="1">black</option>--}}
{{--                                            <option value="1">pink</option>--}}
{{--                                            <option value="1">orange</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal_add_to_cart">--}}
{{--                                        <form action="#">--}}
{{--                                            <input min="1" max="100" step="2" value="1" type="number">--}}
{{--                                            <button type="submit">add to cart</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="modal_social">--}}
{{--                                    <h2>Share this product</h2>--}}
{{--                                    <ul>--}}
{{--                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
{{--                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- modal area end-->

{{--<!--news letter popup start-->--}}
{{--<div class="newletter-popup">--}}
{{--    <div id="boxes" class="newletter-container">--}}
{{--        <div id="dialog" class="window">--}}
{{--            <div id="popup2">--}}
{{--                <span class="b-close"><span>close</span></span>--}}
{{--            </div>--}}
{{--            <div class="box">--}}
{{--                <div class="newletter-title">--}}
{{--                    <h2>Newsletter</h2>--}}
{{--                </div>--}}
{{--                <div class="box-content newleter-content">--}}
{{--                    <label class="newletter-label">Enter your email address to subscribe our notification of our new--}}
{{--                        post &amp; features by email.</label>--}}
{{--                    <div id="frm_subscribe">--}}
{{--                        <form name="subscribe" id="subscribe_popup">--}}
{{--                            <!-- <span class="required">*</span><span>Enter you email address here...</span>-->--}}
{{--                            <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail"--}}
{{--                                   placeholder="Enter you email address here...">--}}
{{--                            <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">--}}
{{--                            <div id="notification"></div>--}}
{{--                            <a class="theme-btn-outlined"--}}
{{--                               onclick="email_subscribepopup()"><span>Subscribe</span></a>--}}
{{--                        </form>--}}
{{--                        <div class="subscribe-bottom">--}}
{{--                            <input type="checkbox" id="newsletter_popup_dont_show_again">--}}
{{--                            <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /#frm_subscribe -->--}}
{{--                </div>--}}
{{--                <!-- /.box-content -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- /.box -->--}}
{{--</div>--}}
{{--<!--news letter popup start-->--}}



<!-- JS
============================================ -->
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


<!-- Mirrored from htmldemo.net/lukani/lukani/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Aug 2023 01:46:15 GMT -->
</html>
