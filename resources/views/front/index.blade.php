@extends('front.layout.master')

@section('title','Home')

@section('body')

{{--    Start Home Page--}}
<!--slider area start-->
<section class="slider_section">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg="front/assets/img/slider/slider7.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>BIG SALE</h1>
                            <p>Discount <span>20% Off </span> For Lukani Members </p>
                            <a class="button" href="{{url("/shop")}}">Discover Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="front/assets/img/slider/slider8.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>TOP SALE</h1>
                            <p>Discount <span>20% Off </span> For Lukani Members </p>
                            <a class="button" href="{{url("/shop")}}">Discover Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="front/assets/img/slider/slider9.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>Lovely Plants </h1>
                            <p>Discount <span>20% Off </span> For Lukani Members </p>
                            <a class="button" href="{{url("/shop")}}">Discover Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="front/assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Free Delivery</h3>
                            <p>Free shipping around the world for all <br> orders over $120</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_2">
                        <div class="shipping_icone">
                            <img src="front/assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Safe Payment</h3>
                            <p>With our payment gateway, don’t worry <br> about your information</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <img src="front/assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Friendly Services</h3>
                            <p>You have 30-day return guarantee for <br> every single order</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->

    <div class="welcome_lukani_store">
    <div class="container">
        <div class="welcome_lukani_container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="welcome_lukani_thumb">
                        <img src="front/assets/img/bg/img-top-vogue3.png" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="welcome_lukani_content">
                        <div class="welcome_lukani_header">
                            <h3>Welcome to PlantNest store</h3>
                            <h2>PlantNest History</h2>
                        </div>
                        <div class="welcome_lukani_desc">
                            <p>Commodo sociosqu venenatis cras dolor sagittis integer luctus sem primis eget
                                maecenas
                                sedurna malesuada consectetuer.</p>
                            <p>Ornare integer commodo mauris et ligula purus, praesent cubilia laboriosam viverra.
                                Mattis id rhoncus. Integer lacus eu volutpat fusce. Elit etiam phasellus suscipit
                                suscipit dapibus,
                                condimentum tempor quis, turpis luctus dolor sapien vivamus.</p>
                        </div>
                        <div class="welcome_lukani_footer">
                            <img src="front/assets/img/bg/signature.png" alt="">
                            <p><span>john doe</span> – CEO PlantNest</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--product area start-->
    <div class="product_area product_style2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="product_style2_ocntainer">
            <div class="row">
                <div class="product_carousel product2_column5 owl-carousel">
                    @foreach($products_featured as $item)
                        <div class="col-lg-3">
                            <div class="product_items">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="shop/{{$item->id}}"><img
                                                    src="{{$item->productImages[0]->path}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">-7%</span>
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart">
                                                        <a href="javascript:addCart({{$item->id}})" title="Add to cart"><i class="icon-shopping-bag"></i></a>
                                                    </li>
                                                    <li class="wishlist">
                                                        <a href="{{url("wishlist/addWish", ["product" => $item])}}" title="Add to Wishlist"><i class="icon-heart"></i></a>
                                                    </li>
                                                    <li class="quick_button">
                                                        <a href="#" data-bs-toggle="modal"
                                                           data-bs-target="#modal_box" title="quick view"> <i class="icon-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="product_rating">
                                                <ul>
                                                    <style>
                                                        /* Icon mặc định (không active) */
                                                        .icon-star {
                                                            color: #ccc;
                                                        }
                                                        /* Icon active (có điểm đánh giá) */
                                                        .icon-star.active {
                                                            color: #ffca08;
                                                        }
                                                    </style>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li><a href="#"><i class="icon-star{{ $i <= $item->averageRating ? ' active' : '' }}"></i></a> </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="shop/{{$item->id}}">{{$item->name}}</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">${{$item->price}}</span>
                                                <span class="old_price">${{$item->discount}}</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
    <!--product area end-->

    <!--testimonial area start-->
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>What Our Customers Says ?</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial_container">
                <div class="row">
                    <div class="testimonial_carousel owl-carousel">
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="front/assets/img/about/testimonials-icon.png" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="front/assets/img/about/testimonial1.png" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Rebecka Filson</a> / <span>CEO of CSC</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="front/assets/img/about/testimonials-icon.png" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="front/assets/img/about/testimonial2.png" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Amber Laha</a> / <span>CEO of DND</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="front/assets/img/about/testimonials-icon.png" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="front/assets/img/about/testimonial3.png" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Lindsy Neloms</a> / <span>CEO of SFD</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial area end-->

    <!--blog area start-->
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Our Latest Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_carousel blog_column3 owl-carousel">
                    @foreach($blogs as $item)
                    <div class="col-lg-3">
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    <a href="blog/{{$item->id}}"><img src="{{$item->image}}" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <h4 class="post_title"><a href="blog/{{$item->id}}">{{$item->title}}</a></h4>
                                    <div class="articles_date">
                                        <p>By <span>{$item->user->first_name}} {{$item->user->last_name}} / {{$item->created_at->format('d/m/Y')}}</span></p>
                                    </div>
                                    <p class="post_desc">{{$item->subtitle}}</p>
                                    <footer class="blog_footer">
                                        <a href="blog/{{$item->id}}">Continue Reading</a>
                                        <p><i class="icon-message-circle"></i> <span>0</span></p>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->

{{--    End Home Page--}}
@endsection

