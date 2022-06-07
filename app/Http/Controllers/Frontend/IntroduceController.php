<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Models\Introduce;
use App\Models\FavoriteProduct;

class IntroduceController extends Controller
{
    public function introduce()
    {
        $introduce = new Introduce();
        $logos = new Logo();
        $this->favorite = new FavoriteProduct();
        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        $intro = $introduce->getIntro();
        $logo = $logos->getLogo();
        return view('frontend.introduce', compact('logo', 'intro', 'number'));
    }
}
