<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use App\Models\Logo;

class PaymentHistories extends Controller
{
    public function index(Request $request)
    {
        $this->logos = new Logo();
        $logo = $this->logos->getLogo();
        $listPaymentHistories = (new PaymentHistory())->getList();
        dd($listPaymentHistories);
        return view('frontend.user.order', compact('listPaymentHistories', 'logo'));
    }

    public function detail(Request $request, PaymentHistory $paymentInfo)
    {
        $this->logos = new Logo();
        $logo = $this->logos->getLogo();
        return view('frontend.user.order', compact('paymentInfo', 'logo'));
    }
}
