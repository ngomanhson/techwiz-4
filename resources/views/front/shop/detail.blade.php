@extends('front.layout.master')
@section('title', 'Shop Detail')
@section('body')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Product</h3>
                        <ul>
                            <li><a href="/shop">Shop List</a></li>
                            <li>Product Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details variable_product mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{$product->productImages[0]->path}}" data-zoom-image="{{$product->productImages[0]->path}}" alt="big-0">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                @foreach($product->productImages as $key => $productImage)
                                    <li>
                                        <a class="elevatezoom-gallery {{ $key === 0 ? 'active' : '' }}" data-image="{{$productImage->path}}" data-zoom-image="{{$productImage->path}}">
                                            <img src="{{$productImage->path}}" alt="zo-th-{{$key}}" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="{{ url('/cart') }}" method="get">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <h1>{{$product->name}}</h1>
                            <div class="product_ratting">
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
                                        <li><a><i class="icon-star{{ $i <= $product->averageRating ? ' active' : '' }}"></i></a> </li>
                                    @endfor
                                    @php
                                        $averageRatingFormatted = number_format($product->averageRating, 1);
                                    @endphp
                                    <span>{{ $averageRatingFormatted }}/5</span>
                                    <li class="review" style="padding-left: 20px"><a> ({{ $product->reviewCount }} customer review) </a></li>
                                </ul>
                            </div>

                            <div class="price_box">
                                <span class="current_price">${{$product->price}}</span>
                                <span class="old_price">${{$product->discount}}</span>
                            </div>

                            <div class="product_desc">
                                <p>{{$product->content}}</p>
                            </div>

                            <div class=" product_d_action">
                                <ul>
                                    <li class="wishlist">
                                        <a href="{{url("wishlist/addWish", ["product" => $product])}}" title="Add to Wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product_d_meta">
                                <span>SKU: {{$product->sku}}</span>
                                <span>Category: <a href="shop/category/{{$product->productCategory->name}}">{{$product->productCategory->name}}</a></span>
                                <span>Number of products available: {{$product->qty}}</span>
                            </div>

                            <div class="product_variant quantity">
                                <button type="submit" class="button" onclick="addCart({{ $product->id }})">Add to Cart</button>
                            </div>
                        </form>
                        <div class="priduct_social">
                            <?php
                            $productUrl = 'https://your-product-url.com'; // Đường dẫn đến sản phẩm thực tế của bạn
                            ?>
                            <ul>
                                <li><a class="facebook" href="https://www.facebook.com/sharer.php?u={{ urlencode($productUrl) }}" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                <li><a class="twitter" href="https://twitter.com/intent/tweet?url={{ urlencode($productUrl) }}" title="twitter"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a class="pinterest" href="https://www.pinterest.com/pin/create/button/?url={{ urlencode($productUrl) }}" title="pinterest"><i class="fa fa-pinterest"></i> Save</a></li>
                                <li><a class="google-plus" href="https://plus.google.com/share?url={{ urlencode($productUrl) }}" title="google +"><i class="fa fa-google-plus"></i> Share</a></li>
                                <li><a class="linkedin" href="https://www.linkedin.com/shareArticle?url={{ urlencode($productUrl) }}" title="linkedin"><i class="fa fa-linkedin"></i> Linked</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                       aria-selected="false">Description</a>
                                </li>
                                <li><a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{ $product->reviewCount }})</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <h2>{{ $product->reviewCount }} reviews of people who bought.</h2>
                                    @foreach($product->productReviews as $productReviews)
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src="front/assets/img/blog/comment2.jpg" alt="">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <div class="star_rating">
                                                        <ul>
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li><a href="#"><i class="icon-star{{ $i <= $productReviews->score ? ' active' : '' }}"></i></a></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <p><strong>{{ $productReviews->user->first_name }} {{ $productReviews->user->last_name }}</strong> - {{ $productReviews->created_at->format('F j, Y') }}</p>
                                                    <span>{{ $productReviews->message }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->
    <section class="product_area related_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_carousel product_column4 owl-carousel">
                    @foreach($pro as $product)
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{url("/shop/{$product->slug}")}}"><img
                                            src="{{$product->productImages[0]->path}}" alt=""></a>
                                    <div class="label_product">
                                        @php
                                            $discountPercentage = - (($product->discount - $product->price) / $product->discount) * 100;
                                        @endphp
                                        <span class="label_sale">{{ number_format($discountPercentage, 0) }}%</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart/add/{{$product->id}}" title="Add to cart"><i
                                                        class="icon-shopping-bag"></i></a></li>
                                            <li class="wishlist"><a href="{{url("wishlist/addWish", ["product" => $product])}}" title="Add to Wishlist"><i
                                                        class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <figcaption class="product_content">
                                    <h4 class="product_name"><a href="{{url("/shop/{$product->slug}")}}">{{$product->name}}</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">${{$product->price}}</span>
                                        <span class="old_price">${{$product->discount}}</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->

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
