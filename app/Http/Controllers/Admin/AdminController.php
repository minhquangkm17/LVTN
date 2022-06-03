<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new Admin();
    }

    public function dashboard(Request $request)
    {
        $mail = $request->mail;
        $pasword = $request->password;
        
        $result = $this->user->getLoginUser($mail, $pasword);
        
       if($result)
       {
            $request->session()->put('name', $result->name);
            $request->session()->put('id', $result->id);
           return redirect()->route('admin.index');
       }
       else
       {
           $request->session()->put('message', 'Sai mật khẩu hoặc tài khoản!');
            return back();
       }
    }

    public function login()
    {
        $id = Session()->get('id');
        if($id)
        { 
            return Redirect::to('/admin/index')->send();
        }

        return view('admin.admin-login');
    }

    //check login
    public function authLogin()
    {
        $id = Session()->get('id');
        if($id == null)
        { 
            return Redirect::to('/admin/login')->send();
        }
    }

     public function admin()
    {
        $this->authLogin();
        return Redirect::to('admin/index');
    }

    public function showDashboard()
    {
        $this->authLogin();
        return view('admin.layouts.dashboard');

    }


    public function logout()
    {
        Session()->put('name', null);
        Session()->put('id', null);

        return Redirect::to('admin/login');
    }

    public function map()
    {
        $this->authLogin();
        return view('admin.layouts.gg-map');
    }
}
