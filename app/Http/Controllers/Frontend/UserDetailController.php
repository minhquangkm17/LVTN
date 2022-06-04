<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
}

