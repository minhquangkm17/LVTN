<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\FavoriteProduct;

class ProductViewController extends Controller
{
    public function __construct()
    {
        $this->category = new Category();
        $this->product = new Product();
        $this->gallery = new Gallery();
        $this->logos = new Logo();
        $this->favorite = new FavoriteProduct();
        
    }

    public function viewProduct()
    {
        $title = 'JK Shop';

        $cate[] = $this->category->getCategory();
        $product = $this->product->getProduct();
        $sale = $this->product->getSaleProduct();
        $logo = $this->logos->getLogo();
        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        

        $array = [];

        //get new price
        foreach ($sale as $key => $value) 
        {
            $price = $value->product_price - ($value->product_price * 0.1);
            $object = (object) ['product' => $value,
                                'newprice' => $price,
                                'slug' => $value->product_slug,
                                'checkFavorite' => $this->favorite->check($value->id)];
            $array[] = $object;
        }
        return view('frontend.product')->with(['cate' => $cate,
                                                'product' => $product,
                                                'title' => $title,
                                                'sale' => $array,
                                                'logo' => $logo,
                                                'number' => $number,
                                               ]);
    }

    public function detail($slug)
    {   
        $result = $this->product->getDetailProduct($slug);
        $product_id = $result->id; // get product id
        $getGallery = $this->gallery->getGalleryByProductId($product_id);
        $logo = $this->logos->getLogo();
        $check = $this->favorite->check($product_id);
        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        return view('frontend.product-detail', compact('result', 'getGallery', 'logo', 'check', 'number'));
    }
}
