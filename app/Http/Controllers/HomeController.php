<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->category = new Category();
        $this->blog = new Blog();
        $this->product = new Product();

    }
    public function home()
    {
       
        $blog = $this->blog->getPost();
        $cate = $this->category->getAllCategories();
        $product = $this->product->getProduct();
        return view('layouts.index')->with(['cate' => $cate, 'blog' => $blog, 'product' => $product]);
    }

}