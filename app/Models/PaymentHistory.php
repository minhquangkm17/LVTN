<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'user_id', 'total', 'name', 'message', 'payment_type', 'payment_at', 'amount'
    ];

    public function getList()
    {
        return $this->where('payment_histories.user_id', auth()->id())
            ->join('orders', 'payment_histories.order_id', '=', 'orders.id')
            ->orderBy('payment_histories.created_at', 'desc')
            ->get();
    }
}
