<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Blog;

class BlogViewController extends Controller
{
     public function __construct()
    {
        $this->blogs = new Blog();
        $this->logos = new Logo();
    }

    public function blog()
    {
        $result[] = $this->blogs->getPost();
        $logo = $this->logos->getLogo();
        return view('frontend.blog', compact('logo', 'result'));
    }

    public function detail($slug)
    {
        $result = $this->blogs->getPostDetails($slug);
    
        $title = $result->post_seo_title;
        $keywords = $result->post_seo_keyword;
        $description = $result->post_seo_desc;
        $logo = $this->logos->getLogo();

        return view('frontend.blog-detail', compact('result', 'title', 'keywords', 'description', 'logo'));
    }
}
