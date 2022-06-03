<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = ['product_name',
                            'product_slug',
                            'brand_id',
                            'category_id',
                            'product_price',
                            'discount',
                            'product_decription',
                            'product_stats',
                            'product_img',
                            'product_spec',
    ];

    //get all product to admin
    public function getAllProduct()
    {
        return DB::table($this->table)
        ->join('brand', 'product.brand_id', '=', 'brand.id')
        ->join('category', 'product.category_id', '=', 'category.id')
        ->select('product.*', 'brand.brand_name', 'category.category_name')
        ->orderBy('id', 'DESC')->paginate(10);
    }

    // get product to edit
    public function edited($id)
    {
        $product = DB::table($this->table)
        ->where('product.id', $id)
        ->join('brand', 'product.brand_id', '=', 'brand.id')
        ->join('category', 'product.category_id', '=', 'category.id')
        ->select('product.*', 'brand.brand_name', 'category.category_name')
        ->first();
        return $product;
    }

    // post edit category
    public function postEdit($data, $id)
    {
        $product = DB::table('product')
        ->where('id', $id)
        ->update([[
            'product_name' => $data],[
            'product_slug' => $data],[
            'brand_id' => $data],[
            'category_id' => $data],[
            'product_price' => $data],[
            'discount' => $data],[
            'product_decription' => $data],[
            'product_stats' => $data],[
            'product_img' => $data],[
            'product_spec' => $data]]);
        return $product;
    }

    // delete a product
    public function del($id)
    {
        return DB::table($this->table)
        ->where('id', $id )
        ->delete();
    }

    //enable
    public function postEnable($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['product_stats' => 1]);
    }

    // disable
    public function postDisable($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['product_stats' => 0]);
    }

    // get product detail to frontend
    public function getDetailProduct($slug)
    {
        return $product = DB::table($this->table)
            ->where('product_slug', $slug)
            ->first();
    }

    //get all product to frontend
    public function getProduct()
    {
        return DB::table($this->table)
        ->join('brand', 'product.brand_id', '=', 'brand.id')
        ->join('category', 'product.category_id', '=', 'category.id')
        ->select('product.*', 'brand.brand_name', 'category.category_name')
        ->orderBy('id', 'DESC')->paginate(12);
    }

    public function getSaleProduct()
    {
        return DB::table($this->table)
        ->join('brand', 'product.brand_id', '=', 'brand.id')
        ->join('category', 'product.category_id', '=', 'category.id')
        ->select('product.*', 'brand.brand_name', 'category.category_name')
        ->where('product.discount', '>', 0)
        ->orderBy('id', 'DESC')
        ->get();
    }
}