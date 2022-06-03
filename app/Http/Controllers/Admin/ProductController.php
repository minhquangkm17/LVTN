<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->categories = new Category();
        $this->brand = new Brand();
        $this->product = new Product();
        $this->gallery = new Gallery();
    }

    // check Login
    public function authLogin()
    {
        $id = Session()->get('id');
        if($id == null)
        { 
            return redirect('/admin/login')->send();
        }
    }

    // showw form add product
    public function showForm()
    {
        $brands[] = $this->brand->getBrand();
        $cate[] = $this->categories->getCategory();
        return view('admin.products.add-product')->with(['brands' =>$brands, 'cate' => $cate]);
    }

    // post add product
    public function postAddProduct(Request $request)
    {
        $this->authLogin();

        // validation input data
        $request->validate([
            'product_name' =>'required',
            'product_price' =>'required|integer',
            'discount' => 'between:1,100',
            'product_decription' =>'required',
            'product_spec' =>'required',
            'product_img' =>'image|required|max:10000',
            'product_slug' => 'required',
        ],[
            'category_name.required' => 'Hãy nhập tên sản phẩm',
            'product_price.required' => 'Hãy nhập giá sản phẩm',
            'product_price.integer' => 'Giá bán phải là một số dương',
            'product_decription.required' => 'Hãy nhập mô tả sản phẩm',
            'product_spec.required' => 'Hãy nhập thông số sản phẩm',
            'product_img.image' => 'Dữ liệu không phải dạng ảnh',
            'product_img.required' => 'Hãy chèn ảnh sản phẩm',
            'product_img.max' => 'Ảnh tối đa 10Mb',
            'discount.between' => 'Discount phải trong khoảng 1% đến 100%'
        ]);

        // custom name, url img
        $get_img = $request->file(['product_img']);

        $name_img = $get_img->getClientOriginalName(); // get original name img
        $get_name_img = current(explode('.',$name_img)); // get name img and stranform to string
        $name_images = $get_name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension(); // insert extendsion into name_img
        $get_img->move(public_path('uploads'),$name_images); // move img to public/uploads
        $url_img = 'public/uploads/'.''. $name_images; // get url img to insert data

        $product_id = DB::table('product')->insertGetId([
            'product_name' => $request->product_name,
            'product_slug' => $request->product_slug,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_price' => $request->product_price,
            'discount' => $request->discount,
            'product_decription' => $request->product_decription,
            'product_spec' => $request->product_spec,
            'product_img' => $url_img,
            'product_stats' => $request->product_stats
            ]);

        $gallery_url = 'public/uploads/gallery/'.''. $name_images;
        file_put_contents($gallery_url, file_get_contents($url_img));
        $gallery_img = DB::table('galleries')->insert([
            'product_id' => $product_id,
            'url' => $gallery_url
            ]);

        // $product_id = $this->product->addProduct($data);
        return redirect('admin/product');
    }

    public function showProduct()
    {
        $this->authLogin();
        $result[] = $this->product->getAllProduct();
        return view('admin.products.show-product')->with(['result' => $result]);
    }

    // show form edit
    public function edit($id)
    {
        $this->authLogin();
        $result = $this->product->edited($id);
        $brands[] = $this->brand->getBrand();
        $cate[] = $this->categories->getCategory();
        return view('admin/products/edit-product')->with(['result' => $result, 'brands' =>$brands, 'cate' => $cate]);
    }
    // post edit product
    public function postEdit(Request $request, Product $id)
    {
        $this->authLogin();
        $request->validate([
            'product_name' =>'required',
            'product_price' =>'required|integer',
            'discount' => 'between:1,100',
            'product_decription' =>'required',
            'product_spec' =>'required',
            'product_img' =>'image|required|max:10000',
        ],[
            'category_name.required' => 'Hãy nhập tên sản phẩm',
            'product_price.required' => 'Hãy nhập giá sản phẩm',
            'product_price.integer' => 'Giá bán phải là một số dương',
            'product_decription.required' => 'Hãy nhập mô tả sản phẩm',
            'product_spec.required' => 'Hãy nhập thông số sản phẩm',
            'product_img.image' => 'Dữ liệu không phải dạng ảnh',
            'product_img.required' => 'Hãy chèn ảnh sản phẩm',
            'product_img.max' => 'Ảnh tối đa 10Mb',
            'discount.between' => 'Discount phải trong khoảng 1% đến 100%'
        ]);

        $get_img = $request->file(['product_img']);

        $name_img = $get_img->getClientOriginalName(); // get original name img
        $get_name_img = current(explode('.',$name_img)); // get name img and stranform to string
        $name_images = $get_name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension(); // insert extendsion into name_img
        $get_img->move(public_path('uploads'),$name_images); // move img to public/uploads
        $url_img = 'public/uploads/'.''. $name_images; // get url img to insert data

        // transmit input data to $data
        $id->update([
            'product_name' => $request->product_name,
            'product_slug' => $request->product_slug,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_price' => $request->product_price,
            'discount' => $request->discount,
            'product_decription' => $request->product_decription,
            'product_spec' => $request->product_spec,
            'product_img' => $url_img,
            ]);

        return redirect('admin/product');
    }

    // update stats show
    public function enable($id)
    {
        $this->authLogin();
        $this->product->postEnable($id);
        return redirect('admin/product');
    }
    // update stats hide
    public function disable($id)
    {
        $this->authLogin();
        $this->product->postDisable($id);
        return redirect('admin/product');
    }

    // delete product and gallery
    public function destroy($id)
    {
        $this->gallery->delGallery($id);
        $this->product->del($id);
        return redirect()->back();
    }

}