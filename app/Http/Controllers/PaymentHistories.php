<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Product;
use App\Models\FavoriteProduct;
use App\Models\Infomation;


class PaymentHistories extends Controller
{
    public function __construct()
    {
        $this->favorite = new FavoriteProduct();
        $this->products = new Product();
        $this->logos = new Logo();
        $this->infomation = new Infomation();
    }
    public function index(Request $request)
    {
        $info = $this->infomation->getInfomation();
        $logo = $this->logos->getLogo();
        $listPaymentHistories = (new PaymentHistory())->getList();
        $listFavorite = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($listFavorite as $key => $value) 
        {
            $number ++;
        }
        return view('frontend.user.order')->with(['listPaymentHistories' => $listPaymentHistories,
                                                    'logo' => $logo,
                                                    'number' => $number,
                                                    'info' => $info]);
    }

    public function detail(Request $request, PaymentHistory $paymentInfo)
    {
        $info = $this->infomation->getInfomation();
        $listFavorite = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($listFavorite as $key => $value) 
        {
            $number ++;
        }
        $logo = $this->logos->getLogo();
        return view('frontend.user.order', compact('paymentInfo', 'logo', 'number', 'info'));
    }
}
