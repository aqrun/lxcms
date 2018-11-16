<?php
namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Helpers\TimeHelper;
use Modules\Backend\Models\AdminUserModel;
use Illuminate\Http\Request;
use Modules\Backend\Models\AdminUserDataTable;


class AdminUsersController extends BaseController
{

    public function init(){
        self::setMenuUri('/admin-users');
    }

    public function index(){
        return $this->view('backend::admin-users.index');
    }

    public function testIndex(Request $request, AdminUserDataTable $adminUserDataTable)
    {
        if($request->ajax()){
            return $adminUserDataTable->ajax();
        }

        $html = $adminUserDataTable->html();
        return $this->view('backend::admin-users.index1', compact('html'));
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

    public function show(AdminUser $adminUser)
    {
        return $this->view('backend::admin-users.show', compact('adminUser'));
    }

    public function create()
    {
        $lang = \LaravelLocalization::getCurrentLocale();
        $user = new AdminUser();
        $timezoneList = TimeHelper::getTimezoneList($lang);
        return $this->view('backend::admin-users.create', compact('user', 'timezoneList'));
    }

    public function store(Request $request)
    {

    }


}
