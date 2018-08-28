<?php
namespace Modules\Backend\Http\Controllers;

use Redirect;

class AuthController extends BaseController
{


    public function login()
    {
        return view('backend::auth.login');
    }

    public function doLogin(){
        $this->validate(request(), [
            'username' => 'required|min:2',
            'password' => 'required|min:5|max:20',
        ]);

        $user = request(['username', 'password']);
        if(\Backend::auth()->attempt($user)){
            return redirect(\Backend::baseUrl('/dashboard'));
        }

        return Redirect::back()->withErrors('用户名或密码有误');
    }

    public function logout()
    {
        \Backend::auth()->logout();
        return redirect(\Backend::baseUrl('/login'));
    }
}