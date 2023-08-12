<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class BlogController extends Controller
{
    //
    public function getRecentPosts()
    {
        $recentPosts = Blog::orderBy('created_at', 'desc')->take(5)->get();
        return $recentPosts;
    }

    public function index()
    {
        $blogs = Blog::paginate(5);
        $recentPosts = $this->getRecentPosts();
        return view('front.blog.index',[
            "blogs"=>$blogs,
            "recentPosts" => $recentPosts,
        ]);
    }

    public function searchBlog(Request $request){
        $q = $request->get("q");
        $blogs = Blog::where("title","like","%$q%")->paginate(8);
        $recentPosts = $this->getRecentPosts();

        return view('front.blog.search',[
           "blogs" => $blogs,
            "recentPosts" => $recentPosts,
        ]);
    }

    public function show(Blog $blog) {
        $relatedBlogs = Blog::where('category', $blog->category)->where('id', '<>', $blog->id)->limit(3)->get();
        $comments = BlogComment::where('blog_id', $blog->id)->orderBy('created_at', 'desc')->paginate(3);
        $recentPosts = $this->getRecentPosts();

        return view('front.blog.show',[
            "blog" => $blog,
            "relatedBlogs" => $relatedBlogs,
            "comments" => $comments,
            "recentPosts" => $recentPosts,
        ]);
    }


    public function addComment(Request $request, Blog $blog) {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to add a comment.');
        }

        $data = $request->validate([
            'comment' => 'required',
        ]);

        $user = Auth::user();

        $comment = new BlogComment();
        $comment->blog_id = $blog->id;
        $comment->user_id = $user->id;
        $comment->email = $user->email;
        $comment->name = $user->first_name . ' ' . $user->last_name;
        $comment->messages = $data['comment'];
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    public function deleteComment(BlogComment $comment) {
        // Kiểm tra xem người dùng có quyền xóa comment hay không
        if (Auth::user() && Auth::user()->level === 0) {
            // Xóa comment
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete this comment.');
        }
    }


}
