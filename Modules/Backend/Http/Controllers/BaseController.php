<?php
namespace Modules\Backend\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use DispatchesJobs, ValidatesRequests, AuthorizesRequests;

    public $modalWidget;

    public function __construct(){
        $this->init();
    }

    public function init(){

    }

    public function view($template, $params=[]){
        $defaultParams = [
        ];
        return view($template, array_merge($defaultParams, $params));
    }

    public static function setMenuUri($uri='/'){
        \Backend::setMenuUri(\Backend::baseUrl($uri, false));
    }

}