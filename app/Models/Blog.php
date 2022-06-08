<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'blogs';

    // get post to frontend
    public function getPost() 
    {
        return DB::table($this->table)
        ->where('post_stats', 1)
        ->orderBy('id', 'DESC')->paginate(4);
    }

    //add post
    public function addBlogs($data)
    {
        $blog = DB::table($this->table)->insert([
            'post_title' => $data],[
            'post_img' => $data],[
            'post_slug' => $data],[
            'post_description' => $data],[
            'post_content' => $data],[
            'post_stats' => $data],[
            'post_seo_title' => $data],[
            'post_seo_desc' => $data],[
            'post_seo_keyword' => $data
        ]);
        return $blog;
    }

    // get post to admin
    public function getAllPosts() 
    {
        return DB::table($this->table)->orderBy('id', 'DESC')->paginate(10);
    }

    public function getPostDetails($slug)
    {
        $post = DB::table($this->table)
        ->where('post_slug', $slug)
        ->first();
        return $post;
    }

    public function postEnable($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['post_stats' => 1]);
    }

    // disable
    public function postDisable($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['post_stats' => 0]);
    }

    public function del($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->delete();
    }

    // get post to edit
    public function edited($id)
    {
        $blogs = DB::table($this->table)
        ->where('id', $id)
        ->first();
        return $blogs;
    }

    // post edit
    public function postEditBrand($data, $id)
    {
        $blogs = DB::table($this->table)
        ->where('id', $id)
        ->update([[
            'post_title' => $data],[
            'post_img' => $data],[
            'post_slug' => $data],[
            'post_description' => $data],[
            'post_content' => $data],[
            'post_stats' => $data],[
            'post_seo_title' => $data],[
            'post_seo_desc' => $data],[
            'post_seo_keyword' => $data]
        ]);
        return $blogs;
    }
    
}
