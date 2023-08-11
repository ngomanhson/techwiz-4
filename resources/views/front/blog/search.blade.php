@extends('front.layout.master')
@section('title', )
@section('body')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog area start-->
    <div class="blog_page_section mt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog_wrapper">
                        @foreach($blogs as $item)
                            <article class="single_blog">
                                <figure>
                                    <div class="blog_thumb">
                                        <a><img src="{{$item->image}}" alt="" style="height: 250px; width: 500px;object-fit: cover"></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h4 class="post_title"><a href="blog/{{$item->id}}"><i class="fa fa-paper-plane"></i>
                                                {{$item->title}}</a></h4>
                                        <div class="blog_meta">
                                            <p>By <a>{{$item->user->first_name}} {{$item->user->last_name}}</a> / Date <a>{{$item->created_at->format('d/m/Y')}}</a>  / Category: <a>
                                                    {{$item->category}}</a></p>
                                        </div>
                                        <p class="post_desc">{{$item->subtitle}}</p>
                                        <footer class="btn_more">
                                            <a href="blog/{{$item->id}}"> Read more</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        @include("front.blog.sidebar.sidebar")
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->

    <!--blog pagination area start-->
    <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--blog pagination area end-->
@endsection
