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
        return $this->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
