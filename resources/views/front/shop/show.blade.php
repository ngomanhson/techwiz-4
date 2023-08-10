@extends('front.layout.master')
@section('title', )
@section('body')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Shop</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>shop list</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h3>Women</h3>
                                <ul>
                                    <li class="widget_sub_categories sub_categories1"><a
                                            href="javascript:void(0)">Shoes</a>
                                        <ul class="widget_dropdown_categories dropdown_categories1">
                                            <li><a href="#">Document</a></li>
                                            <li><a href="#">Dropcap</a></li>
                                            <li><a href="#">Dummy Image</a></li>
                                            <li><a href="#">Dummy Text</a></li>
                                            <li><a href="#">Fancy Text</a></li>
                                        </ul>
                                    </li>
                                    <li class="widget_sub_categories sub_categories2"><a
                                            href="javascript:void(0)">Bags</a>
                                        <ul class="widget_dropdown_categories dropdown_categories2">
                                            <li><a href="#">Flickr</a></li>
                                            <li><a href="#">Flip Box</a></li>
                                            <li><a href="#">Cocktail</a></li>
                                            <li><a href="#">Frame</a></li>
                                            <li><a href="#">Flickrq</a></li>
                                        </ul>
                                    </li>
                                    <li class="widget_sub_categories sub_categories3"><a
                                            href="javascript:void(0)">Clothing</a>
                                        <ul class="widget_dropdown_categories dropdown_categories3">
                                            <li><a href="#">Platform Beds</a></li>
                                            <li><a href="#">Storage Beds</a></li>
                                            <li><a href="#">Regular Beds</a></li>
                                            <li><a href="#">Sleigh Beds</a></li>
                                            <li><a href="#">Laundry</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget_list widget_filter">
                                <h3>Filter by price</h3>
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount" />

                                </form>
                            </div>
                            <div class="widget_list widget_color">
                                <h3>Select By Color</h3>
                                <ul>
                                    <li>
                                        <a href="#">Black <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> Blue <span>(8)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Brown <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> Green <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Pink <span>(4)</span></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="widget_list widget_color">
                                <h3>Select By SIze</h3>
                                <ul>
                                    <li>
                                        <a href="#">S <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> M <span>(8)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">L <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#"> XL <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">XLL <span>(4)</span></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="widget_list widget_manu">
                                <h3>Manufacturer</h3>
                                <ul>
                                    <li>
                                        <a href="#">Brake Parts <span>(6)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Accessories <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Engine Parts <span>(4)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">hermes <span>(10)</span></a>
                                    </li>
                                    <li>
                                        <a href="#">louis vuitton <span>(8)</span></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="widget_list tags_widget">
                                <h3>Product tags</h3>
                                <div class="tag_cloud">
                                    <a href="#">Men</a>
                                    <a href="#">Women</a>
                                    <a href="#">Watches</a>
                                    <a href="#">Bags</a>
                                    <a href="#">Dress</a>
                                    <a href="#">Belt</a>
                                    <a href="#">Accessories</a>
                                    <a href="#">Shoes</a>
                                </div>
                            </div>
                            <div class="widget_list">
                                <h3>Compare</h3>
                                <div class="shop_sidebar_product">
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="{{url('shop/detail/{id}')}}"><img
                                                        src="front/assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="{{url('shop/detail/{id}')}}"><img
                                                        src="front/assets/img/product/product2.jpg" alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="{{url('shop/detail/{id}')}}">Donec Non
                                                        Est</a></h4>
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$80.00</span>
                                                    <span class="old_price">$20.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="{{url('shop/detail/{id}')}}"><img
                                                        src="front/assets/img/product/product9.jpg" alt=""></a>
                                                <a class="secondary_img" href="{{url('shop/detail/{id}')}}"><img
                                                        src="front/assets/img/product/product3.jpg" alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html">Cas Meque
                                                        Metus</a></h4>
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$70.00</span>
                                                    <span class="old_price">$40.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="{{url('shop/detail/{id}')}}"><img
                                                        src="front/assets/img/product/product8.jpg" alt=""></a>
                                                <a class="secondary_img" href="{{url('shop/detail/{id}')}}"><img
                                                        src="front/assets/img/product/product4.jpg" alt=""></a>
                                            </div>
                                            <figcaption class="product_content">
                                                <h4 class="product_name"><a href="product-details.html"> commodo
                                                        augue</a></h4>
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">$80.00</span>
                                                    <span class="old_price">$20.00</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-bs-toggle="tooltip"
                                    title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                                    title="4"></button>

                            <button data-role="grid_list" type="button" class="active btn-list" data-bs-toggle="tooltip"
                                    title="List"></button>
                        </div>
                        <div class=" niceselect_option">
                            <form  action="">
                                <select name="sort_by" onchange="this.form.submit();" class="sorting">
                                    <option {{request('sort_by') == 'latest' ? 'selected' : ''}} value="latest">Latest</option>
                                    <option {{request('sort_by') == 'oldest' ? 'selected' : ''}} value="oldest">Oldest</option>
                                    <option {{request('sort_by') == 'name-ascending' ? 'selected' : ''}} value="name-ascending">Name A-Z</option>
                                    <option {{request('sort_by') == 'name-descending' ? 'selected' : ''}} value="name-descending">Name Z-A</option>
                                    <option {{request('sort_by') == 'price-ascending' ? 'selected' : ''}} value="price-ascending">Price Ascending</option>
                                    <option {{request('sort_by') == 'price-descending' ? 'selected' : ''}} value="price-descending">Price Decrease</option>
                                </select>
                            </form>
                        </div>

                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper grid_list">
                        @foreach($product as $pr)
                        <div class="col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{url('shop/detail/{id}')}}"><img
                                                src="/{{$pr->productImages[0]->path}}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-7%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart/add/{{$pr->id}}" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="action_links list_action">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal_box" title="quick view"> <i
                                                            class="icon-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="product_price_rating">
                                            <div class="product_rating">
                                                <ul>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4 class="product_name"><a href="{{url("/shop/detail/{$pr->id}")}}">{{$pr->name}}</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">${{$pr->price}}</span>
                                                <span class="old_price">${{$pr->discount}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4 class="product_name"><a href="product-details.html">{{$pr->name}}</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">{{$pr->price}}</span>
                                            <span class="old_price">{{$pr->discount}}</span>

                                        <h4 class="product_name"><a href="{{url("/shop/detail/{$pr->id}")}}">{{$pr->name}}</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">${{$pr->price}}</span>
                                            <span class="old_price">${{$pr->discount}}</span>
                                        </div>
                                        <div class="product_desc">
                                            <p>{{$pr->description}}</p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart/add/{{$pr->id}}" title="Add to cart">Add to
                                                        cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="icon-heart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i
                                                            class="icon-sliders"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            {!! $product->appends(app("request")->input())->links("pagination::bootstrap-4") !!}

                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
@endsection
