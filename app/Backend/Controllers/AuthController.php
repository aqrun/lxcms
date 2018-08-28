<?php
namespace App\Backend\Controllers;

use Auth;
use Redirect;

class AuthController extends BaseController
{


    public function login()
    {
        return view('b::auth.login');
    }

    public function doLogin(){
        $this->validate(request(), [
            'username' => 'required|min:2',
            'password' => 'required|min:5|max:20',
        ]);

        $user = request(['username', 'password']);
        if(Auth::guard('admin_guard')->attempt($user)){
            return redirect(\Backend::baseUrl('/dashboard'));
        }

        return Redirect::back()->withErrors('用户名或密码有误');
    }

    public function logout()
    {
        Auth::guard('admin_guard')->logout();
        return redirect(\Backend::baseUrl('/login'));
    }
}