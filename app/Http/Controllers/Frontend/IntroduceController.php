<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Introduce;

class IntroduceController extends Controller
{
    public function introduce()
    {
        $introduce = new Introduce();
        $banners = new Banner();

        $intro = $introduce->getIntro();
        $banner = $banners->getBanner();
        return view('frontend.introduce', compact('banner', 'intro'));
    }
}
