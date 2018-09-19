<?php
namespace Modules\Backend\Http\Controllers;

class AdminUsersController extends BaseController
{

    public function init(){
        self::setMenuUri('/admin-users');
    }

    public function index(){

        return $this->view('backend::admin-users.index');
    }

    public function indexData(){
        return [];
    }
}