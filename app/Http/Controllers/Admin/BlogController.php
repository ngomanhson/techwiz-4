<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductImage;
use App\Service\Blog\BlogServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Common;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController
{
    private $blogService;
    private $productCategoryService;

    public function __construct(BlogServiceInterface $blogService,
    ProductCategoryServiceInterface $productCategoryService)
    {
        $this->blogService=$blogService;
        $this->productCategoryService=$productCategoryService;
    }
    public function index(Request $request){
        $status = $request->input('status');
        $list_act = [
            'delete' => 'Temporary delete'
        ];
        if ($status == 'trash') {
            $list_act = [
                'restore' => 'Restore',
                'forceDelete' => 'Permanently deleted'
            ];
            $blogs = Blog::onlyTrashed()->paginate(10);
        } else {

            $search = '';
            if ($request->input('search')) {
                $search = $request->input('search');
            }
            $blogs = Blog::where('title', 'LIKE', "%{$search}%")->paginate(10);
        }
        $count_user_active = Blog::count();
        $count_user_trash = Blog::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];
        return view('admin.blog.index', compact('blogs', 'count', 'list_act', 'status'));
    }
    public function create(){
        $loggedInUserName = Auth::user()->id;
        return view('admin.blog.create', ['loggedInUserName' => $loggedInUserName]);
    }
    public function store(Request $request){
        $request->validate([
           'image' => 'required',
           'title' => 'required',
           'category' => 'required',
           'content' => 'required',
           'subtitle' => 'required'
        ]);
        $name = $request->get("title");

        $extBlog = Blog::where('title', $name)->first();
        if ($extBlog){
            return back()->with('notification', 'ERROR: Blog title already exists');
        }

        $image = null;
        if($request->hasFile("image")){
            $file = $request->file("image");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("front/assets/img/blog");
            $file->move($path,$fileName);
            $image = "front/assets/img/blog/".$fileName;
        }

        $blog = new Blog();
        $blog->title = $name;
        $blog->slug = Str::slug($request->get("title"));
        $blog->user_id = Auth::user()->id;
        $blog->category = $request->get("category");
        $blog->content = $request->get("content");
        $blog->subtitle = $request->get("subtitle");
        $blog->image = $image;
        $blog->save();

        Toastr::success('Successful product creation.', 'Success!');
        return redirect('admin/blog/show/' . $blog->id);
    }
    public function delete($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();
        Toastr::success('Deleted member successfully', 'Success!');
        return redirect('admin/blog');
    }
    public function show($id){
        $blogs =Blog::find($id);
        return view('admin.blog.show',['blogs' => $blogs]);
    }
    public function edit($id){
        $blogs =Blog::find($id);
        $productCategories=$this->productCategoryService->all();
        return view('admin.blog.edit',['blogs' => $blogs,
            'productCategories'=>$productCategories]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
//            'image' => 'required',
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'subtitle' => 'required'
        ]);

        $name = $request->get("title");

        // Kiểm tra xem tên danh mục đã tồn tại hay chưa
        $existingBlog = Blog::where('title', $name)->first();
        if ($existingBlog) {
            Toastr::error('Name already exists.', 'ERROR!');
            return back();
        }

        // Lấy thông tin người dùng cần cập nhật
        $blogs = Blog::findOrFail($id);

        $image = null;
        if($request->hasFile("image")){
            $file = $request->file("image");
            $fileName = time().$file->getClientOriginalName();
            $path = public_path("front/assets/img/blog");
            $file->move($path,$fileName);
            $image = "front/assets/img/blog/".$fileName;

            Blog::where("id", $id)
                ->update([
                    "title" => $request->input("title"),
                    "slug"=>Str::slug($request->input("title")),
                    "image"=>$image,
                    "category" => $request->get("category"),
                    "content" => $request->get("content"),
                    "subtitle" => $request->get("subtitle"),
                ]);
        } else {
            Blog::where("id", $id)
                ->update([
                    "title" => $request->input("title"),
                    "slug"=>Str::slug($request->input("title")),
                    "category" => $request->get("category"),
                    "content" => $request->get("content"),
                    "subtitle" => $request->get("subtitle"),
                ]);
        }

        Toastr::success('Successful product updated.', 'Success!');
        return redirect('admin/blog/show/' . $blogs->id);

    }

    public function action(Request $request){
        $list_check =$request->input('list_check');
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act');

                if ($act == 'delete') {
                    Blog::destroy($list_check);
                    return redirect('admin/blog')->with('status', 'You have successfully deleted');
                } elseif ($act == 'restore') {
                    Blog::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/blog')->with('status', 'You have successfully recovered');
                } elseif ($act == 'forceDelete') {
                    Blog::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/blog')->with('status', 'You have permanently deleted');
                } else {
                    return redirect('admin/blog')->with('status', 'Invalid action');
                }
            }

            return redirect('admin/blog')->with('status', 'You need to choose an action to perform');
        }

        return redirect('admin/product')->with('status', 'No items selected');
    }


}
