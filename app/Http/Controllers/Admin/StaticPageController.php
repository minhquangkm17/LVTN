<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduce;
use Illuminate\Support\Facades\DB;
use App\Models\Logo;
use App\Models\Infomation;

class StaticPageController extends Controller
{
    public function __construct()
    {
        $this->intro = new Introduce();
        $this->logos = new Logo();
        $this->infomation = new Infomation();

    }

    public function authLogin()
    {
        $id = Session()->get('id');
        if($id == null)
        { 
            return redirect('/admin/login')->send();
        }
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
        $logo = $this->logos->getLogo();
        return view('admin.static-page.edit-img', compact('logo'));
    }

    public function postEditLogo(Request $request)
    {
        $this->authLogin();
        $request->validate([
            'url' =>'image|required|max:10000',
        ],[
            'url.image' => 'Dữ liệu không phải dạng ảnh',
            'url.required' => 'Hãy chèn ảnh sản phẩm',
            'url.max' => 'Ảnh tối đa 10Mb',
        ]);

        $get_img = $request->file(['url']);

        $name_img = $get_img->getClientOriginalName(); // get original name img
        $get_name_img = current(explode('.',$name_img)); // get name img and stranform to string
        $name_images = $get_name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension(); // insert extendsion into name_img
        $get_img->move(public_path('uploads/logo/'),$name_images); // move img to public/uploads
        $url_img = 'public/uploads/logo/'.''. $name_images; // get url img to insert data

        // transmit input data to $data
        $logo = DB::table('logos')
            ->where('id', 1)
            ->update(['url' => $url_img]);

        return back();
    }

    public function editInfo()
    {
        $info = $this->infomation->getInfomation();
        return view('admin.static-page.edit-info', compact('info'));
    }

    public function postEditInFo(Request $request)
    {
        $info = DB::table('infomations')
        ->where('id', 1)
        ->update([  'address' => $request->address,
                    'number_phone' => $request->number_phone,
                    'email' => $request->email,
                    'opentime' => $request->opentime,
                    'closetime' => $request->closetime]);

        return redirect()->route('admin.static.editInfo');
    }


}
