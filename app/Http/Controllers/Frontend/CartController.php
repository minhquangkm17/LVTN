<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentHistory;
use App\Models\Product;
use App\Models\Logo;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function paymentProcessor(Request $request)
    {
        if (array_key_exists('momo', $request->all())) {
            $this->paymentMomo($request->all());
        } elseif (array_key_exists('money', $request->all())) {
            $this->paymentMoney($request->all());
        }
        return redirect()->route('cart.shoppingcart')->send();
    }

    public function callback(Request $request)
    {
        DB::beginTransaction();
        try {
            $params = $request->all();
            if ($params['resultCode'] == '1006') {
                echo $params['message'];
//                return view('')->with(['errorMessage'=>$params['message']]);
            } elseif ($params['resultCode'] != 0) {
                echo $params['message'];
                abort(500);
            }
            $orderInfo = Order::find($params['orderId']);
            $orderInfo->update(['status' => config('site.status.charge')]);
            PaymentHistory::create([
                'order_id' => $orderInfo['id'],
                'user_id' => auth()->id(),
                'total' => $orderInfo['total'],
                'name' => auth()->user()['name'],
                'message' => $params['message'] ?? '',
                'payment_type' => 'momo',
                'payment_at' => Carbon::now()->format('y-m-d H:i:s'),
                'amount' => $params['amount'],
            ]);
            (new Cart())->getCartByUserId(auth()->id())->each->forceDelete();
            DB::commit();
            return redirect()->route('cart.shoppingcart')->send()->with(['message' => $params['message']]);
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function paymentMomo($params)
    {
        try {
            DB::beginTransaction();
            $carts = [];
            foreach ($params['product_id'] as $key => $productId) {
                $carts [] = [$productId => $params['number'][$key]];
            }
            $carts = json_encode($carts);
            $order = Order::create([
                'user_id' => auth()->id(),
                'carts' => $carts,
                'address' => $params['address'],
                'note' => $params['note'],
                'total' => $params['total'],
                'amount' => $params['amount'],
                'status' => config('site.status.uncharged'),
            ]);
            // dd(auth()->user()['name'] . ' thanh toan MoMo', $order['id'], $order['total'], $order['id']);
            $momo = $this->paymentProcessMoMo(auth()->user()['name'] . ' thanh toan MoMo', $order['id'], $order['total'], $order['id']);
            // dd($momo);
            if (isset($momo['resultCode']) && $momo['resultCode'] === 0) {
                DB::commit();
                return redirect()->to($momo['payUrl'])->send();
            };
            return back()->withErrors(['payment' => $momo['message']]);
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function paymentMoney($params)
    {
        DB::beginTransaction();
        try {
            $carts = [];
            foreach ($params['product_id'] as $key => $productId) {
                $carts [] = [$productId => $params['number'][$key]];
            }
            $carts = \GuzzleHttp\json_encode($carts);
            $order = Order::create([
                'user_id' => auth()->id(),
                'carts' => $carts,
                'address' => $params['address'],
                'note' => $params['note'],
                'total' => $params['total'],
                'amount' => $params['amount'],
                'status' => config('site.status.charge'),
            ]);
            (new Cart())->getCartByUserId(auth()->id())->each->forceDelete();
            PaymentHistory::create([
                'order_id' => $order['id'],
                'user_id' => auth()->id(),
                'total' => $order['total'],
                'name' => auth()->user()['name'],
                'message' => $params['message'] ?? '',
                'payment_type' => 'momo',
                'payment_at' => Carbon::now()->format('y-m-d H:i:s'),
                'amount' => $order['amount'],
            ]);
            DB::commit();
            return redirect()->route('cart.shoppingcart')->send();

        } catch (Exception $exception) {
            DB::rollBack();
            // dd($exception->getMessage());
            abort(500);
        }
    }

    public function paymentProcessMoMo($orderInfo, $orderId, $amount, $requestId)
    {
        $endpoint = config('site.momo.api_endpoint');
        $partnerCode = config('site.momo.pathner_code');
        $accessKey = config('site.momo.access_token');
        $secretKey = config('site.momo.secret_token');
        $ipnUrl = route('payment.callback');

        $returnUrl = route('payment.callback');
        $requestType = "captureWallet";
        $extraData = "";
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $returnUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'extraData' => $extraData,
            'lang' => 'vi',
            'accessKey' => $accessKey,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $returnUrl,
            'requestType' => $requestType,
            'requestId' => $requestId,
            'ipnUrl' => $ipnUrl,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        return json_decode($result, true);
    }

    public function cart()
    {
        $cart = new Cart();
        $logos = new Logo();

        $listCart = $cart->getCartByUserId(auth()->id());
        $logo = $logos->getLogo();
        return view('frontend.shoping-cart')->with(['listCart' => $listCart,
                                                    'logo' => $logos]);
    }

    public function addCart(Request $request, Product $productInfo)
    {
        DB::beginTransaction();
        try {
            $cart = new Cart();
            $cartInfo = $cart->getCartByUserIdAndProductId(auth()->id(), $productInfo['id']);
            if (!empty($cartInfo)) {
                $cartInfo->update(['number' => ($cartInfo['number']) + 1]);
            } else {
                $cart = Cart::create([
                    'product_id' => $productInfo['id'],
                    'user_id' => auth()->id(),
                ]);
            }
            DB::commit();
            return response()->json([
                'message' => 'Thêm sản phẩm thành công',
            ], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function removeCart(Request $request)
    {
        try {
            $productId = $request['productId'];
            $productInfo = Product::find($productId);
            if (empty($productInfo)) {
                return response()->json(['message' => 'Product Not Found'], 404);
            }
            $cart = new Cart();
            $cartInfo = $cart->getCartByUserIdAndProductId(auth()->id(), $productInfo['id']);
            if (empty($cartInfo) || $cartInfo['number'] <= 0) {
                return response()->json(['Product Not Exist In Cart'], 404);
            }
            DB::beginTransaction();
            $number = $cartInfo['number'];
            if ($number == 1) {
                // $cartInfo->forceDelete();
                return response()->json([
                'message' => 'Số lượng không thể nhỏ hơn 1',
            ], 200);
            } else {
                $number -= 1;
                $update = $cartInfo->update(
                    [
                       
                        'number' => $number,
                    ]
                );
            }

            DB::commit();
            return response()->json(['message' => "Remove Successfully"], 200);
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function number(Request $request)
    {
        $cart = new Cart();
        $number = count($cart->getCartByUserId(auth()->id()));
        return response()->json(['number' => $number], 200);
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    public function delItem($cartInfor)
    {
        DB::table('carts')
        ->where('id', $cartInfor)
        ->delete();
        return redirect()->back();
    }
}
