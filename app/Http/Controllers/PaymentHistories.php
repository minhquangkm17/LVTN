<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Illuminate\Http\Request;

class PaymentHistories extends Controller
{
    public function index(Request $request)
    {
        $listPaymentHistories = (new PaymentHistory())->getList();
//        return view('')->with(['listPaymentHistories' => $listPaymentHistories]);
    }

    public function detail(Request $request, PaymentHistory $paymentInfo)
    {
//        return view('')->with(['paymentInfo' => $paymentInfo]);
    }
}
