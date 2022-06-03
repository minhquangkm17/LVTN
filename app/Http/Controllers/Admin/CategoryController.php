<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->category = new Category();
    }
    
    // check Login
    public function authLogin()
    {
        $id = Session()->get('id');
        if(!isset($id))
        { 
            return redirect('/admin/login')->send();
        }
    }

    // show category
    public function showCategory()
    {
        $this->authLogin();

        $result[] = $this->category->getAllCategories();
        return view('admin.category.show-category')->with(['result' => $result]);
    }

    // show form add category
    public function showForm()
    {
        $this->authLogin();
        return view('admin.category.add-category');
    }

    // post add category
    public function addCategory(Request $request)
    {
        $this->authLogin();
        $request->validate([
            'category_name' =>'required|max:50',
            'description' =>'required'
        ],[
            'category_name.required' => 'Hãy nhập tên danh mục',
            'category_name.max' => 'Tối đa 50 kí tự',
            'description.required' => 'Hãy nhập mô tả danh mục',
        ]);

        $data = [
        'stt' => $request->stt,
        'category_name' => $request->category_name,
        'description' => $request->description,
        'stats' => $request->stats
        ];
        
        $this->category->addCategories($data);
        return redirect('admin/category');
    }

    // update stats show
    public function active($id)
    {
        $this->authLogin();
        $this->category->postActive($id);
        return redirect('admin/category');
    }

    // update stats hide
    public function unactive($id)
    {
        $this->authLogin();
        $this->category->postUnactive($id);
        return redirect('admin/category');
    }

    // show form edit
    public function edit($id)
    {
        $this->authLogin();
        $result = $this->category->edited($id);
        return view('admin/category/edit-category')->with(['result' => $result]);
    }

    // post edit category
    public function postEdit(Request $request, Category $id)
    {
        $this->authLogin();
        $request->validate([
            'category_name' =>'required|max:50',
            'description' =>'required|max:1000'
        ],[
            'category_name.required' => 'Hãy nhập tên danh mục',
            'category_name.max' => 'Tối đa 50 kí tự',
            'description.required' => 'Hãy nhập mô tả danh mục',
            'description.max' => 'Tối đa 1000 kí tự',
        ]);

        $id->update([
            'category_name' => $request->category_name,
            'description'=>$request->description,
        ]);
        return redirect('admin/category');
    }

    // delete category
    public function destroy($id)
    {
        $this->authLogin();
        $this->category->del($id);
        return redirect()->back();
    }
}
