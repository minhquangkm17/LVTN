<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FavoriteProduct;
use App\Models\UserDetail;
use App\Models\Logo;
use App\Models\Infomation;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    public function __construct()
    {
        $this->users = new UserDetail();
        $this->logos = new Logo();
        $this->favorite = new FavoriteProduct();
        $this->infomation = new Infomation();
    }

    public function userDetail()
    {
        $logo = $this->logos->getLogo();
        $list = $this->favorite->getFavoriteProduct();
        $info = $this->infomation->getInfomation();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        return view('frontend.user.user-detail', compact('logo', 'number', 'info'));
    }

    public function editUserDetail (Request $request, $userInfo)
    {
        $password = $request->password;
        $email = $this->users->getUserByUserId($userInfo)->email;
        $verifyPassword = Auth::attempt(['email' => Auth::user()->email, 'password' => $password]);
        
        if($verifyPassword == true)
        {
           $user = DB::table('users')
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

            $request->session()->put('message', 'Thành công!');
            return back();
        } else { 
            $request->session()->put('message', 'Mật khẩu không trùng khớp!');
            return back();
        }
    }

    public function favoriteProduct ()
    {
        $info = $this->infomation->getInfomation();
        $logo = $this->logos->getLogo();
        $list = $this->favorite->getFavoriteProduct();
        $number = 0;
        foreach ($list as $key => $value) 
        {
            $number ++;
        }    
        return view('frontend.user.favorite-product', compact('logo', 'list', 'number', 'info'));
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

    public function changePassword()
    {
        $logo = $this->logos->getLogo();
        $info = $this->infomation->getInfomation();
        $number = 0;
        $list = $this->favorite->getFavoriteProduct();
        foreach ($list as $key => $value) 
        {
            $number ++;
        }
        
        return view('frontend.user.change-password', compact('logo', 'info', 'number'));
    }

    public function postChangePassword (UserRequest $request, $userInfo)
    {
        $password = $request->old_password;
        $verifyPassword = Auth::attempt(['email' => Auth::user()->email, 'password' => $password]);
        dd($verifyPassword);
        if($verifyPassword == true)
        {
            DB::table('users')
            ->where('id', $userInfo)
            ->update([
                    'password' => bcrypt($request->password),
                ]);

            $request->session()->put('message', 'Thành công!');
            return back();
        } else { 
            $request->session()->put('message', 'Mật khẩu không trùng khớp!');
            return back();
        }
    }
}

