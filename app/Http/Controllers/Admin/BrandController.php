<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use RealRashid\SweetAlert\Facades\Aler;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->brands = new Brand();
    }

    // check Login
    public function authLogin()
    {
        $id = Session()->get('id');
        if($id == null)
        { 
            return redirect('/admin/login')->send();
        }
    }

    //show brand
    public function showBrand()
    {
        $this->authLogin();

        $result[] = $this->brands->getAllBrand();
        return view('admin.brand.show-brand')->with(['result' => $result]);
    }

    // show form add brand
    public function showForm()
    {
        $this->authLogin();
        return view('admin.brand.add-brand');
    }

    // post add brand
    public function addBrand(Request $request)
    {
        $this->authLogin();
        $request->validate([
            'brand_name' =>'required|max:50',
            'brand_description' =>'required|max:2000'
        ],[
            'brand_name.required' => 'Hãy nhập tên danh mục',
            'brand_name.max' => 'Tối đa 50 kí tự',
            'brand_description.required' => 'Hãy nhập mô tả danh mục',
            'brand_description.max' => 'Tối đa 2000 kí tự',
        ]);

        $data = [
        'brand_name' => $request->brand_name,
        'brand_description' => $request->brand_description,
        'brand_stats' => $request->brand_stats,
        ];
        
        $this->brands->addBrands($data);
        return redirect('admin/brand');
    }

    // update enable status
    public function enable($id)
    {
        $this->authLogin();
        $this->brands->postEnable($id);
        return redirect('admin/brand');
    }

    // update disable status
    public function disable($id)
    {
        $this->authLogin();
        $this->brands->postDisable($id);
        return redirect('admin/brand');
    }

    // show form edit
    public function edit($id)
    {
        $this->authLogin();
        $result = $this->brands->edited($id);
        return view('admin/brand/edit-brand')->with(['result' => $result]);
    }
    // post edit brand
    public function postEdit(Request $request, Brand $id)
    {
        $this->authLogin();
        $request->validate([
            'brand_name' =>'required|max:50',
            'brand_description' =>'required|max:2000'
        ],[
            'brand_name.required' => 'Hãy nhập tên danh mục',
            'brand_name.max' => 'Tối đa 50 kí tự',
            'brand_description.required' => 'Hãy nhập mô tả danh mục',
            'brand_description.max' => 'Tối đa 2000 kí tự',
        ]);

        $id->update([
            'brand_name' => $request->brand_name,
            'brand_description'=>$request->brand_description
        ]);

        // dd($brand);

        return redirect('admin/brand');
    }

    // delete brand
    public function destroy($id)
    {
        $this->brands->del($id);
        return redirect()->back();
    }
}
