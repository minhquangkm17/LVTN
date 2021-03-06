<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FavoriteProduct;
use App\Models\Infomation;
use App\Models\Logo;
use App\Models\Blog;

class BlogViewController extends Controller
{
     public function __construct()
    {
        $this->blogs = new Blog();
        $this->logos = new Logo();
        $this->favorite = new FavoriteProduct();
        $this->infomation = new Infomation();
    }

    public function blog()
    {
        $result[] = $this->blogs->getPost();
        $logo = $this->logos->getLogo();
        $info = $this->infomations->getInfomation();

        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        return view('frontend.blog', compact('logo', 'result', 'number', 'info'));
    }

    public function detail($slug)
    {
        $result = $this->blogs->getPostDetails($slug);
    
        $title = $result->post_seo_title;
        $keywords = $result->post_seo_keyword;
        $description = $result->post_seo_desc;
        $info = $this->infomation->getInfomation();

        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        $logo = $this->logos->getLogo();

        return view('frontend.blog-detail', compact('result', 'title', 'keywords', 'info',
                                                    'description', 'logo', 'number'));
    }
}
