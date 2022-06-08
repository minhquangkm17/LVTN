<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\FavoriteProduct;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Infomation;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->category = new Category();
        $this->blog = new Blog();
        $this->product = new Product();
        $this->logos = new Logo();
        $this->favorite = new FavoriteProduct();
        $this->infomation = new Infomation();

    }
    public function home()
    {
        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        $blog = $this->blog->getPost();
        $cate = $this->category->getAllCategories();
        $product = $this->product->getProduct();
        $logo = $this->logos->getLogo();
        $info = $this->infomation->getInfomation();
        return view('layouts.index', compact('cate', 'blog', 'product', 'logo', 'number', 'info'));
    }

}