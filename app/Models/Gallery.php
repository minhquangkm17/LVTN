<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';
    protected $fillable = ['url', 'product_id'];

    //add img in the gallery
    public function addGallery($data)
    {
        $galleries = DB::table($this->table)->insert([
            'product_id' => $data],[
            'url' => $data
        ]);
        return $galleries;
    }

    //delete 1 img in the gallery
    public function del($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->delete();
    }

    //delete all gallery if delete product
    public function delGallery($id)
    {
        return DB::table($this->table)
        ->where('product_id', $id )
        ->delete();
    }

    public function getGalleryByProductId($id)
    {
        return $gallery = DB::table($this->table)
        ->where('product_id', $id)
        ->get();
    }

     
}
