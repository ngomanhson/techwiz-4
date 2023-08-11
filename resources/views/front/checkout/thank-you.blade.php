@extends('front.layout.master')
@section('title','Thank You')
@section('body')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Thank you</h3>
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Thank you</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- Checkout Section Begin -->
    <div class="Checkout_section  mt-100" id="accordion">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 style="font-weight: 400;">{{$notification}}</h4>
                    <a href="{{url("/shop")}}" class="btn btn-dark mt-3">Continue shopping</a>
                    <a href="{{url("/account")}}" class="btn mt-3">Order history</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
