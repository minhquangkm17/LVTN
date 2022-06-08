<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Infomation extends Model
{
    use HasFactory;

    protected $table = 'infomations';
    protected $fillable = ['address', 'number_phone', 'email'];

    public function getInfomation()
    {
        return DB::table($this->table)
        ->where('id', 1)
        ->first();
    }

}
