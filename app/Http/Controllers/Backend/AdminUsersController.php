<?php
namespace App\Http\Controllers\Backend;

class AdminUsersController extends BaseController
{

    public function __construct(){
        self::setMenuUri('/admin-users');
    }

    public function index(){

        return $this->view('backend.admin-users.index');
    }
}