<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->gallery = new Gallery();
    }
    public function authLogin()
    {
        $id = Session()->get('id');
        if($id == null)
        { 
            return redirect('/admin/login')->send();
        }
    }

    public function gallery($id)
    {
        return view('admin.products.gallery')->with(compact('id'));
    }

    public function selectGallery(Request $request)
    {
        $product_id = $request->product_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>';
        if($gallery_count > 0)
        {
            $i = 0;
            foreach($gallery as $key => $value)
            {
                $url = '';
                $i++;
                $output .= '
                            <tr>
                                <td>'.$i.'</td>
                                <td><img src="'.url($value->url).'" class="img-responsive" width="100px"></td>
                                <td><a href="'.url('/admin/product/destroy/'.$value->id.'').'" class="btn btn-sx btn-danger">Xóa</button></td>
                            </tr>';
            }
        }else{
            $output .= '<tr>
                            <td colspan="3">Gallery trống</td>
                        </tr>';
        }
        echo $output;

    }

    public function addGallery(Request $request, $id)
    {
        $get_img = $request->file(['file']);

        
        if($get_img)
        {
            foreach($get_img as $image)
            {       
                $get_name_img = $image->getClientOriginalName(); // get original name img
                $name_img = current(explode('.',$get_name_img)); // get name img and transform to string
                $new_image = $name_img.rand(0,9999).'.'.$image->getClientOriginalExtension(); // insert extendsion into name_img
                $image->move(public_path('uploads/gallery/'),$new_image); // move img to public/uploads
                $url_img = 'public/uploads/gallery/'.''. $new_image; // get url img to insert data
                
                $data = [
                    'product_id' => $id,
                    'url' => $url_img,
                ];
                
                $this->gallery->addGallery($data);
            }   
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->gallery->del($id);
        return redirect()->back();
    }
}