<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';
    protected $fillable = ['banner_name', 'banner_url'];


     public function getBanner()
    {
        return DB::table($this->table)
                ->where('id', 1)
                ->first();
    }
}
