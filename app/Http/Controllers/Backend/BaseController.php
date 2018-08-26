<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use DispatchesJobs, ValidatesRequests, AuthorizesRequests;

    public static $menuUri = '/';

    public function view($template, $params=[]){
        $defaultParams = [
            'menuUri' => static::$menuUri,
        ];
        return view($template, array_merge($defaultParams, $params));
    }

}