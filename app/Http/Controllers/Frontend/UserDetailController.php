<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FavoriteProduct;
use App\Models\UserDetail;
use App\Models\Logo;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    public function __construct()
    {
        $this->users = new UserDetail();
        $this->logos = new Logo();
        $this->favorite = new FavoriteProduct();
    }

    public function userDetail()
    {
        $logo = $this->logos->getLogo();
        return view('frontend.user.user-detail', compact('logo'));
    }

    public function editUserDetail (Request $request, $userInfo)
    {
        $password = $request->password;
        $email = $this->users->getUserByUserId($userInfo)->email;
        $verifyPassword = Auth::attempt(['email' => $email, 'password' => $password]);
        
        if($verifyPassword == true)
        {
            DB::table('users')
            ->where('id', $userInfo)
            ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

            DB::table('user_detail')
            ->where('user_id', $userInfo)
            ->update([
                    'full_name' => $request->full_name,
                    'number_phone' => $request->number_phone,
                    'birthday' => $request->birthday,
                    'address' => $request->address,
                ]);

            return back();
        } else { 
            return redirect()->route('index')->send();
        }
    }

    public function favoriteProduct ()
    {
        $logo = $this->logos->getLogo();
        $list = $this->favorite->getFavoriteProduct();
        return view('frontend.user.favorite-product', compact('logo', 'list'));
    }

    public function addFavoriteProduct(Request $request, $productInfo)
    {
        DB::table('favorite_products')
        ->insert([
            'product_id' => $productInfo,
            'user_id' => auth()->id(),
            'created_at' => time(),
        ]);

        return back();
    }

    public function delFavoriteProduct($productInfo)
    {
        $this->favorite->delFavoriteProduct($productInfo);
        return back();
    }
}

