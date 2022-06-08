<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Introduce extends Model
{
    use HasFactory;

    protected $table = 'introduces';
    protected $fillable = ['post_content'];

     public function getIntro()
    {
        return DB::table($this->table)
        ->where('id', 1)
        ->first();
    }
}
