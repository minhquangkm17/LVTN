<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Models\Introduce;

class IntroduceController extends Controller
{
    public function introduce()
    {
        $introduce = new Introduce();
        $logos = new Logo();

        $intro = $introduce->getIntro();
        $logo = $logos->getLogo();
        return view('frontend.introduce', compact('logo', 'intro'));
    }
}
