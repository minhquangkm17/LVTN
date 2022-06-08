<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'product_id',
        'user_id',
        'number',
    ];

    public function getCartByUserIdAndProductId($userId, $productId)
    {
        return $this->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
    }
    public function getCartByUserId($userId)
    {
        return $this->where('user_id', $userId)
            ->get();
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

}
