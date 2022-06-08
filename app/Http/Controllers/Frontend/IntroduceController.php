<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Models\Introduce;
use App\Models\FavoriteProduct;
use App\Models\Infomation;

class IntroduceController extends Controller
{
    public function __construct()
    {
        $this->infomation = new Infomation();
        $this->favorite = new FavoriteProduct();
        $this->introduce = new Introduce();
        $this->logos = new Logo();
    }
    public function introduce()
    {
        
        $info = $this->infomation->getInfomation();
        
        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        $intro = $this->introduce->getIntro();
        $logo = $this->logos->getLogo();
        return view('frontend.introduce', compact('logo', 'intro', 'number', 'info'));
    }
}
