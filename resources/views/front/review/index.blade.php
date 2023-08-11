@extends('front.layout.master')
@section('title', )
@section('body')
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: left;
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
        }

        .rating > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating > input:checked ~ label:before {
            opacity: 1
        }

        .rating:hover > input:checked ~ label:before {
            opacity: 0.4
        }

    </style>
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Review</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Review</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-pane" id="reviews" role="tabpanel">
                        <div class="reviews_wrapper">
                            <div class="row mb-5">
                                <div class="col-lg-2">
                                    <img style="width: 100%; height: 100%" src="{{$orderDetail->product->productImages[0]->path}}" class="img-fluid" alt="...">
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <h4 class="text-dark" style="max-width: 100%">{{$orderDetail->product->name}}</h4>
                                        <p style="max-width: 100%">{{$orderDetail->product->description}}</p>
                                    </div>

                                </div><div class="col-lg-4">
                                    <p style="float: right; color: #79a206">${{$orderDetail->product->price}}</p>
                                </div>
                            </div>
                            <div class="comment_title">
                                <h2>Add a review </h2>
                            </div>
                            <form action="{{url('review/store')}}" method="post">
                                @csrf
                                <div class="product_ratting mb-10">
                                    <h3>Your rating</h3>
                                    <div class="rating">
                                        <input type="radio" name="score" value="5" id="5">
                                        <label for="5">☆</label>
                                        <input type="radio" name="score" value="4" id="4">
                                        <label for="4">☆</label>
                                        <input type="radio" name="score" value="3" id="3">
                                        <label for="3">☆</label>
                                        <input type="radio" name="score" value="2" id="2">
                                        <label for="2">☆</label>
                                        <input type="radio" name="score" value="1" id="1">
                                        <label for="1">☆</label>
                                    </div>
                                </div>
                                <div class="product_review_form">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Your review </label>
                                            <textarea name="message" id="review_comment"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="orderdetail_id" value="{{$orderDetail->id}}"/>
                                    <button type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
