<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FavoriteProduct extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'favorite_products';

    public function getFavoriteProduct()
    {
        return DB::table($this->table)
                ->where('user_id', auth()->id())
                ->join('product', 'product.id', '=', 'favorite_products.product_id')
                // ->orderBy('created_at', 'desc')
                ->get();
    }

    public function delFavoriteProduct($productInfo)
    {
        return DB::table($this->table)
        ->where('product_id', $productInfo)
        ->delete();
    }

    public function check($productInfo)
    {
        return DB::table($this->table)
        ->where('product_id', $productInfo)
        ->where('user_id', auth()->id())
        ->first();
    }
}
