<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogViewController extends Controller
{
     public function __construct()
    {
        $this->blogs = new Blog();
    }

    public function blog()
    {
        $result[] = $this->blogs->getPost();
        return view('frontend.blog')->with(['result' => $result]);
    }

    public function detail($slug)
    {
        $result = $this->blogs->getPostDetails($slug);
    
        $title = $result->post_seo_title;
        $keywords = $result->post_seo_keyword;
        $description = $result->post_seo_desc;

        return view('frontend.blog-detail')->with(['result' => $result, 'title' => $title, 'keywords' => $keywords, 'description' => $description]);
    }
}
