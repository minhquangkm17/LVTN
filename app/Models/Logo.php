<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Logo extends Model
{
    use HasFactory;
    protected $table = 'logos';
    protected $fillable = ['url'];


     public function getLogo()
    {
        return DB::table($this->table)
                ->where('id', 1)
                ->first();
    }
}
