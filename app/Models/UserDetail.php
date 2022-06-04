<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserDetail extends Model
{
    use HasFactory;

    protected $table='user_detail';
    protected $fillable = ['user_id',
                            'full_name',
                            'number_phone',
                            'birthday',
                            'address',
                        ];

    public function getUserByUserId($userInfo)
    {
        return DB::table($this->table)
        ->join('users', 'user_detail.user_id', '=', 'users.id')
        ->select('user_detail.*', 'users.*')
        ->first();
    }
}
