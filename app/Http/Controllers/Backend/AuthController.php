<?php
namespace App\Http\Controllers\Backend;

use Auth;
use Redirect;

class AuthController extends BaseController
{


    public function login()
    {
        return view('backend.auth.login');
    }

    public function doLogin(){
        $this->validate(request(), [
            'username' => 'required|min:2',
            'password' => 'required|min:5|max:20',
        ]);

        $user = request(['username', 'password']);
        if(Auth::guard('admin_guard')->attempt($user)){
            return redirect('/backend/dashboard');
        }

        return Redirect::back()->withErrors('用户名密码不匹配');
    }

    public function logout()
    {
        Auth::guard('admin_guard')->logout();
        return redirect('/backend/login');
    }
}