<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['brand_name',
                            'brand_description',
                            ];
    protected $table = 'brand';

    //get all Brand
    public function getAllBrand()
    {
        return DB::table($this->table)->orderBy('id', 'DESC')->paginate(10);
    }

    // add a brand
    public function addBrands($data)
    {
        $brand = DB::table($this->table)->insert([
            'brand_name' => $data],[
            'brand_description' => $data],[
            'brand_stats' => $data,
        ]);
        return $brand;
    }

    //enable
    public function postEnable($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['brand_stats' => 1]);
    }

    // disable
    public function postDisable($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['brand_stats' => 0]);
    }

    // get brand to edit
    public function edited($id)
    {
        $brand = DB::table($this->table)
        ->where('id', $id)
        ->first();
        return $brand;
    }

    // post edit category
    public function postEditBrand($data, $id)
    {
        $brand = DB::table($this->table)
        ->where('id', $id)
        ->update([['brand_name' => $data],
                ['brand_description' => $data]]);
        return $brand;
    }

    // delete a brand
    public function del($id)
    {
        return DB::table($this->table)
        ->where('id', $id)
        ->delete();
    }

    //get brand with stats = 1
    public function getBrand()
    {
        return DB::table($this->table)
        ->where('brand_stats', 1)
        ->get();
    }
    
}
