<?php
namespace App\Http\Controllers\Backend;

class AdminUsersController extends BaseController
{
    public function index(){
        // 当前URL
        static::$menuUri = \Backend::baseUrl('/admin-users');

        return $this->view('backend.admin-users.index');
    }
}