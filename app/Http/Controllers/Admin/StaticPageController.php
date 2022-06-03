<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduce;
use Illuminate\Support\Facades\DB;

class StaticPageController extends Controller
{
    public function __construct()
    {
        $this->intro = new Introduce();

    }

     public function intro()
    {
        $result = $this->intro->getIntro();

        return view('admin.static-page.edit-introduce')->with(['result' => $result]);
    }

    public function postEditIntro(Request $request)
    {
        $product_id = DB::table('introduces')
        ->where('id', 1)
        ->update([
                'post_content' => $request->content,
                'post_seo_title' => $request->post_seo_title,
                'post_seo_desc' => $request->post_seo_desc,
                'post_seo_keyword' => $request->post_seo_keyword,
            ]);     
        
        return back();
    }

    public function img ()
    {
        return view('admin.static-page.edit-img');
    }
}
