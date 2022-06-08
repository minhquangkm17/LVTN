<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->blogs = new Blog();
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

    //show form add post
    public function addBlog()
    {
        return view('admin.blog.add-blog');
    }

    // add post
    public function postAddBlog(Request $request)
    {
        $this->authLogin();
        $request->validate([
            'title' =>'required',
            'blog_description' =>'required|max:200',
            'blog_content' =>'required',
            'blog_img' =>'image|required|max:2000',
        ],[
            'blog_title.required' => 'Hãy nhập tiêu đề bài viết',
            'blog_description.required' => 'Hãy nhập tóm tắt bài viết',
            'blog_description.max200' => 'Tóm tắt bài viết nhỏ hơn 200 kí tự',
            'blog_content.required' => 'Hãy nhập nội dung bài viết',
            'blog_img.image' => 'Dữ liệu không phải dạng ảnh',
            'blog_img.required' => 'Hãy chèn đại diện bài viết',
            'blog_img.max' => 'Ảnh tối đa 2Mb',
        ]);

        // custom name, url img
        $get_img = $request->file(['blog_img']);

        $name_img = $get_img->getClientOriginalName(); // get original name img
        $get_name_img = current(explode('.',$name_img)); // get name img and stranform to string
        $name_images = $get_name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension(); // insert extendsion into name_img
        $get_img->move(public_path('uploads/blogs/'),$name_images); // move img to public/uploads
        $url_img = 'public/uploads/blogs/'.''. $name_images; // get url img to insert data

        // insert data 
        $data = [
        'post_title' => $request->title,
        'post_img' => $url_img,
        'post_slug' => $request->slug,
        'post_description' => $request->blog_description,
        'post_content' => $request->blog_content,
        'post_stats' => $request->blog_stats,
        'post_seo_title' => $request->post_seo_title,
        'post_seo_desc' => $request->post_seo_desc,
        'post_seo_keyword' => $request->post_seo_keyword,
        'created_at' => date('Y-m-d')
        ];
        
        $this->blogs->addBlogs($data);
        return redirect('admin/blog');
    }

    //show post
    public function showPost()
    {
        $this->authLogin();

        $result[] = $this->blogs->getAllPosts();
        return view('admin.blog.show-blog')->with(['result' => $result]);
    }

    // update stats show
    public function enable($id)
    {
        $this->authLogin();
        $this->blogs->postEnable($id);
        return redirect('admin/blog');
    }
    // update stats hide
    public function disable($id)
    {
        $this->authLogin();
        $this->blogs->postDisable($id);
        return redirect('admin/blog');
    }

    // delete post
    public function destroy($id)
    {
        $this->blogs->del($id);
        return redirect()->back();
    }

    // edit blogs
    public function edit($id)
    {
        $this->authLogin();
        $result = $this->blogs->edited($id);
        return view('admin/blog/edit-blog')->with(['result' => $result]);
    }
    // post edit product
    public function postEdit(Request $request, Blog $id)
    {
        $this->authLogin();
        // $request->validate([
        //     'post_title' =>'required',
        //     'post_description' =>'required|max:200',
        //     'post_content' =>'required',
        //     'post_img' =>'image|required|max:2000',
        // ],[
        //     'post_title.required' => 'Hãy nhập tiêu đề bài viết',
        //     'post_description.required' => 'Hãy nhập tóm tắt bài viết',
        //     'post_description.max200' => 'Tóm tắt bài viết nhỏ hơn 200 kí tự',
        //     'post_content.required' => 'Hãy nhập nội dung bài viết',
        //     'product_img.image' => 'Dữ liệu không phải dạng ảnh',
        //     'product_img.required' => 'Hãy chèn đại diện bài viết',
        //     'product_img.max' => 'Ảnh tối đa 2Mb',
        // ]);

        // custom name, url img
        $get_img = $request->file(['post_img']);
        $name_img = $get_img->getClientOriginalName(); // get original name img
        $get_name_img = current(explode('.',$name_img)); // get name img and stranform to string
        $name_images = $get_name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension(); // insert extendsion into name_img
        $get_img->move(public_path('uploads/blogs/'),$name_images); // move img to public/uploads
        $url_img = 'public/uploads/blogs/'.''. $name_images; // get url img to insert data

        // transmit input data to $data
        $id->update([
            'post_title' => $request->title,
            'post_img' => $url_img,
            'post_slug' => $request->slug,
            'post_content' => $request->post_content,
            'post_seo_title' => $request->post_seo_title,
            'post_seo_desc' => $request->post_seo_desc,
            'post_seo_keyword' => $request->post_seo_keyword,
            ]);

        return redirect('admin/blog');
    }
}
