<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Blog;

class BlogViewController extends Controller
{
     public function __construct()
    {
        $this->blogs = new Blog();
        $this->banners = new Banner();
    }

    public function blog()
    {
        $result[] = $this->blogs->getPost();
        $banner = $this->banners->getBanner();
        return view('frontend.blog', compact('banner', 'result'));
    }

    public function detail($slug)
    {
        $result = $this->blogs->getPostDetails($slug);
    
        $title = $result->post_seo_title;
        $keywords = $result->post_seo_keyword;
        $description = $result->post_seo_desc;
        $banner = $this->banners->getBanner();

        return view('frontend.blog-detail', compact('result', 'title', 'keywords', 'description', 'banner'));
    }
}
