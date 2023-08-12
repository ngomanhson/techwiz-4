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
                        <form action="{{ request()->segment(2) == 'product' ? 'shop' : '' }}">
                        <div class="widget_inner">
                            <div class="widget_list widget_color">
                                <h3>Select By Category</h3>
                                <ul>
                                    @foreach($category as $ct)
                                        <li>
                                            <a href="shop/category/{{$ct->name}}">{{$ct->name}} <span>({{count($ct->products)}})</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget_list widget_color">
                                <h3>Select By Size</h3>
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

                            <div class="widget_list widget_color">
                                <h3>Filter Price</h3>
                                <div id="collapseThree" class="filter-widget collapse show" data-parent="#accordionExample">
                                    <div class="filter-range-wrap">
                                        <div class="range-slider">
                                            <div class="price-input">
                                                <input type="text" id="minamount" name="price_min">
                                                <input type="text" id="maxamount" name="price_max">
                                            </div>
                                        </div>
                                        <div
                                            class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                            data-min="10" data-max="999"
                                            data-min-value="{{str_replace('$','',request('price_min'))}}"
                                            data-max-value="{{str_replace('$','',request('price_max'))}}">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark" style="width: 100%; font-weight: 600">Filter</button>
                                </div>
                            </div>
                        </div>

                        </form>
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
                                        <a class="primary_img" href="shop/{{$pr->slug}}"><img
                                                src="/{{$pr->productImages[0]->path}}" alt="{{$pr->name}}"></a>
                                        <div class="label_product">
                                            <span class="label_sale">-7%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="javascript:addCart({{$pr->id}})" title="Add to cart"><i
                                                            class="icon-shopping-bag"></i></a></li>

                                                <li class="wishlist"><a href="#!" title="Add to Wishlist"><i
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
                                            <h4 class="product_name"><a href="{{url("/shop/{$pr->slug}")}}">{{$pr->name}}</a></h4>
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
                                        <h4 class="product_name"><a href="{{url("/shop/{$pr->id}")}}">{{$pr->name}}</a>
                                        </h4>
                                        <div class="price_box">
                                            <span class="current_price">${{$pr->price}}</span>
                                            <span class="old_price">${{$pr->discount}}</span>
                                            <div class="product_desc">
                                                <p class="line-clamp" style="--line-clamp: 5;">{{$pr->description}}</p>
                                            </div>
                                            <div class="action_links list_action_right">
                                                <ul>
                                                    <li class="add_to_cart"><a href="javascript:addCart({{$pr->id}})" title="Add to cart">Add to
                                                            cart</a></li>
                                                    <li class="wishlist"><a href="#" title="Add to Wishlist"><i
                                                                class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    <div class="t_bottom mb-5">
                        {!! $product->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
@endsection
