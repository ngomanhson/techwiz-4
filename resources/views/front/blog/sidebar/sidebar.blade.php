<div class="widget_list widget_search">
    <div class="widget_title">
        <h3>Search</h3>
    </div>
    <form action="/blog/search-blog"  method="get">
        <input placeholder="Search..." value="{{app("request")->input('q')}}" name="q" type="text">
        <button type="submit">search</button>
    </form>
</div>
<div class="widget_list widget_post">
    <div class="widget_title">
        <h3>Recent Posts</h3>
    </div>
    @foreach($recentPosts as $recentPost)
    <div class="post_wrapper">
            <div class="post_thumb">
                <a href="blog/{{$recentPost->slug}}"><img src="{{$recentPost->image}}" alt=""></a>
            </div>
            <div class="post_info">
                <h4><a href="blog/{{$recentPost->slug}}">{{ $recentPost->title }}</a></h4>
                <span>{{ $recentPost->created_at->format('F d, Y') }}</span>
            </div>
    </div>
    @endforeach
</div>

