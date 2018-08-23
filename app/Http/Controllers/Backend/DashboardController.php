<?php
namespace App\Http\Controllers\Backend;

class DashboardController extends BaseController
{

    /**
     * backend index
     * @return string
     */
    public function index(){

        return view('backend.dashboard.index', [
            'a' => 'sdfkdjsfljsdlfj'
        ]);
    }

    public function test(){
        return __('test');
    }
}
