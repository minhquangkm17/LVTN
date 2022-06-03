<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Introduce;

class IntroduceController extends Controller
{
    public function introduce()
    {
        $this->intro = new Introduce();

        $result = $this->intro->getIntro();
        return view('frontend.introduce')->with(['result' => $result]);
    }
}
