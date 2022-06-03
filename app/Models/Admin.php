<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    public function getAllUser()
    {
        return $this->get();
    }

    public function getLoginUser($mail, $password)
    {
        return $this->where('mail','=',$mail)
        ->where('password', '=', $password)
        ->first();
    }

}