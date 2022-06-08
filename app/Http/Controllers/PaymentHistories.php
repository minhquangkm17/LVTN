<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use App\Models\Infomation;
use App\Models\Logo;
use App\Models\Order;
use App\Models\PaymentHistory;
use App\Models\Product;
use Illuminate\Http\Request;


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
        dd($listPaymentHistories);
        $listFavorite = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($listFavorite as $key => $value) {
            $number++;
        }
        return view('frontend.user.order')->with(['listPaymentHistories' => $listPaymentHistories,
            'logo' => $logo,
            'number' => $number,
            'info' => $info]);
    }

    public function detail(Request $request, PaymentHistory $paymentInfo)
    {
        $order = $paymentInfo->order;
        $listProduction = Order::getListProduct($order['carts']);
        dd($listProduction);
//        return view('frontend.user.order', compact('paymentInfo', 'logo', 'number', 'info'));
    }
}
