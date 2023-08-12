<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Common;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $productService;
    private $productCategoryService;
    public function __construct(ProductServiceInterface $productService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService=$productService;
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
            $product = Product::onlyTrashed()->paginate(10);
        } else {

            $search = '';
            if ($request->input('search')) {
                $search = $request->input('search');
            }
            $product = Product::where('name', 'LIKE', "%{$search}%")->paginate(10);
        }
        $count_user_active = Product::count();
        $count_user_trash = Product::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];
        return view('admin.product.index', compact('product', 'count', 'list_act', 'status'));
    }
    public function show($id){
        $product =Product::find($id);
        return view('admin.product.show',['product' => $product]);
    }
    public function create(){
        $productCategories=$this->productCategoryService->all();
        return view('admin.product.create',compact('productCategories'));
    }
    public function store(Request $request){
//        dd($request->hasFile("image"));
        $request->validate([
                'image'=>'required',
//                'tag'=>'required',
//                'sku'=>'required',
//                'weight'=>'required',
//                'country'=>'required',
//                'price'=>'required',
//                'content'=>'required',
//                'product_category_id'=>'required',
//                'brand_id'=>'required',
//                'description'=>'required'
            ]
        );
        $featured = $request->has('featured') ? 1 : 0;
        $name = $request->get("name");
        $sku = $request->get("sku");

        // Kiểm tra xem tên danh mục đã tồn tại hay chưa
        $existingProduct = Product::where('name', $name)->first();
        $existingProduct1 = Product::where('sku', $sku)->first();
        if ($existingProduct) {
            return back()->with('notification', 'ERROR: Category name already exists');
        }
        if ($existingProduct1) {
            return back()->with('notification', 'ERROR: Category name already exists');
        }
//        $data =$request->all();
//        $data['qty']= 0;
//        $data['slug'] = Str::slug($data['name']);
//        $data['featured'] = 0;
//        $data['rate'] = 0;
//        $product=$this->productService->create($data);
        $product = new Product();
            $product->name = $request->get("name");
            $product->slug = Str::slug($request->get("name"));
            $product->sku = $request->get("sku");
            $product->weight = $request->get("weight");
            $product->price = $request->get("price");
            $product->discount = $request->get("discount");
            $product->qty = $request->get("qty");
            $product->content = $request->get("content");
            $product->product_category_id = $request->get("product_category_id");
            $product->species = $request->get("species");
            $product->description = $request->get("description");
            $product->rate = 0;
            $product->featured = $featured;
            $product->save();

        if ($request->hasFile('image')){
            $data['product_id'] = $product->id;
            $data['path']= Common::uploadFile($request->file('image'), 'front/assets/img/product/');
            unset($data['image']);
            $data['path'] = "front/assets/img/product/".$data['path'];
            ProductImage::create($data);
        }
        Toastr::success('Successful product creation.', 'Success!');
        return redirect('admin/product/show/' . $product->id);
    }
    public function edit($id){
        $product =Product::find($id);
        $productCategories=$this->productCategoryService->all();
        return view('admin.product.edit',['product' => $product,
            'productCategories'=>$productCategories]);
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();

        // Lấy thông tin người dùng cần cập nhật
        $product = Product::findOrFail($id);


        // Cập nhật dữ liệu người dùng
        $product->update($data);
        Toastr::success('Successful product updated.', 'Success!');
        return redirect('admin/product/show/' . $product->id);

    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        Toastr::success('Deleted member successfully', 'Success!');
        return redirect('admin/product');
    }
    public function action(Request $request){
        $list_check =$request->input('list_check');
        if ($list_check) {
            if (!empty($list_check)) {
                $act = $request->input('act');

                if ($act == 'delete') {
                    Product::destroy($list_check);
                    return redirect('admin/product')->with('status', 'You have successfully deleted');
                } elseif ($act == 'restore') {
                    Product::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/product')->with('status', 'You have successfully recovered');
                } elseif ($act == 'forceDelete') {
                    Product::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/product')->with('status', 'You have permanently deleted');
                } else {
                    return redirect('admin/product')->with('status', 'Invalid action');
                }
            }

            return redirect('admin/product')->with('status', 'You need to choose an action to perform');
        }
        return redirect('admin/product')->with('status', 'No items selected');
    }

}
