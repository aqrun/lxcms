<?php
namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Models\AdminUserModel;
use Illuminate\Http\Request;

class AdminUsersController extends BaseController
{

    public function init(){
        self::setMenuUri('/admin-users');
    }

    public function index(){
        return $this->view('backend::admin-users.index');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function indexData(Request $request){
        $model = new AdminUserModel();
        $data = $model->getList($request);
        return $data;
    }
}
