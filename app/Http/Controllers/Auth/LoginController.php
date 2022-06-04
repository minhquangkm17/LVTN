<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
           return redirect()->route('user.editUserDetail.',auth()->id());
        }else{
            dd("THat bai");
        }
    }
}
