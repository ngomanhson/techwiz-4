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
                            <li>blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog body area start-->
    <div class="blog_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper blog_wrapper_details">
                        <article class="single_blog">
                            <figure>
                                <div class="post_header">
                                    <h3 class="post_title">{{$blog->title}}</h3>
                                    <div class="blog_meta">
                                        <p>Posted by : <a>{{$blog->user->first_name}} {{$blog->user->last_name}}</a> / On : <a>{{$blog->created_at->format('d/m/Y')}}</a> / In
                                            : <a>{{$blog->category}}</a></p>
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                    <a><img src="{{$blog->image}}" alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <div class="post_content">
                                        <p>{{$blog->content}}</p>
                                        <blockquote>
                                            <p>{{$blog->subtitle}}</p>
                                        </blockquote>
                                    </div>
                                    <div class="entry_content">
                                        <div class="post_meta">
                                            <span>Category: </span>
                                            <span><a>{{$blog->category}}</a></span>
                                        </div>

                                        <div class="social_sharing">
                                            <p>share this post:</p>
                                            <ul>
                                                <li><a title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a title="pinterest"><i class="fa fa-pinterest"></i></a>
                                                </li>
                                                <li><a title="google+"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <li><a title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                        <div class="related_posts">
                            <h3>Related posts</h3>
                            <div class="row">
                                @foreach($relatedBlogs as $relatedBlog)
                                    <div class="col-lg-4 col-md-6">
                                        <article class="single_related">
                                            <figure>
                                                <div class="related_thumb">
                                                    <a href="blog/{{$relatedBlog->slug}}">
                                                        <img href="blog/{{$relatedBlog->slug}}" src="{{ $relatedBlog->image }}" alt="">
                                                    </a>
                                                </div>
                                                <figcaption class="related_content">
                                                    <h4><a href="blog/{{$relatedBlog->slug}}">{{ $relatedBlog->title }}</a></h4>
                                                    <div class="blog_meta">
                                                        <span class="author">By : <a href="#">{{ $relatedBlog->user->first_name }} {{ $relatedBlog->user->last_name }}</a> / </span>
                                                        <span class="meta_date">{{ $relatedBlog->created_at->format('F d, Y') }}</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="comments_box">
                            <h3>{{ $comments->count() }} Comments</h3>
                            <div class="comment_list">
                                @foreach($comments as $comment)
                                    <div class="comment_thumb">
                                        <img src="front/assets/img/blog/comment3.png.jpg" alt="">
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <h5><a href="#">{{ $comment->name }}</a></h5>
                                            <span>{{ $comment->created_at->format('F d, Y \a\t h:i a') }}</span>
                                        </div>
                                        <p>{{ $comment->messages }}</p>
                                        <div class="comment_reply">
                                            @if(Auth::check() && Auth::user()->level === 0)
                                                <a  onclick="confirmDelete('{{ route('blog.delete_comment', $comment->id) }}')" style="color: white">Delete Comment</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination">
                                {{ $comments->links() }}
                            </div>
                        </div>
                        <script>
                            function confirmDelete(url) {
                                if (confirm('Are you sure you want to delete this comment?')) {
                                    window.location.href = url; // Chuyển hướng đến URL để xóa comment
                                }
                            }
                        </script>

                        <div class="comments_form">
                            @guest
                                <p><a href="{{url("/account/login")}}" style="font-size: 18px; font-weight: bold; color: #7AA204">Login to comment.</a></p>
                            @else
                                <h3>Add a comment</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <form action="{{ route('blog.add_comment', $blog->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Comment</label>
                                            <textarea name="comment" id="review_comment" required></textarea>
                                        </div>
                                    </div>
                                    <button class="button" type="submit">Post Comment</button>
                                </form>
                            @endguest
                        </div>

                    </div>
                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        @include("front.blog.sidebar.sidebar")
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->
    @endsection
