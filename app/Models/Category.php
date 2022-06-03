<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'category';

    // add category
    public function addCategories($data)
    {
        $category = DB::table($this->table)->insert([
            'stt' => $data],[
            'category_name' => $data],[
            'description' => $data],[
            'stats' => $data
        ]);
        return $category;
    }
    // get all category
    public function getAllCategories()
    {
        return DB::table($this->table)->orderBy('stt', 'ASC', 'id', 'DESC')->paginate(10);
    }
    // active status
    public function postActive($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['stats' => 1]);
    }
    // unactive status
    public function postUnactive($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['stats' => 0]);
    }
    // get category to edit
    public function edited($id)
    {
        $category = DB::table($this->table)
        ->where('id', $id)
        ->first();
        return $category;
    }
    // post edit category
    public function postEditCategory($data, $cate_id)
    {
        $category = DB::table($this->table)
        ->where('id', $cate_id)
        ->update([['category_name' => $data],
                ['description' => $data]]);
        return $category;
    }
    // delete a category
    public function del($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->delete();
    }

    // get category with stats =1
    public function getCategory()
    {
        return DB::table($this->table)
        ->where('stats', 1)
        ->get();
    }
}
