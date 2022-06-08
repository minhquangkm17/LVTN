<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'carts', 'address', 'note', 'total', 'amount', 'status'
    ];

    public static function getListProduct($carts)
    {
        $carts = json_decode($carts, true);
        $listProduct = [];
        foreach ($carts as $cart) {
            $listProduct['product'][] = Product::find(key($cart));
            $listProduct['number'][] = $cart[key($cart)];
        }
        return $listProduct;
    }
}
