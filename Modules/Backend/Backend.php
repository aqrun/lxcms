<?php
namespace Modules\Backend;

use Auth;
use Modules\Backend\Entities\Menu;

class Backend
{
    public static $menuUri = '/';
    public static $hash = null;

    public function getMenuUri()
    {
        return static::$menuUri;
    }

    public function setMenuUri($uri){
        static::$menuUri = $uri;
    }

    public function path($path){
        return module_path('Backend') . $path;
    }

    public function guardName(){
        return config('backend.guard_name');
    }

    public function auth(){
        return Auth::guard($this->guardName());
    }

    /**
     * Left sider-bar menu.
     *
     * @return array
     */
    public function menu()
    {
        return (new Menu())->toTree($this->guardName());
    }

    /**
     * Get admin title.
     *
     * @return Config
     */
    public function title()
    {
        return config('backend.title');
    }

    /**
     * Get current login user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->auth()->user();
    }

    /**
     * Get backend url.
     *
     * @param string $path
     *
     * @return string
     */
    public function baseUrl($path = '')
    {
        $prefix = '/'.trim(config('backend.prefix'), '/');

        $prefix = ($prefix == '/') ? '' : $prefix;

        return $prefix.'/'.trim($path, '/');
    }

    /**
     * each page include script file according
     * @param $templateFile
     */
    public function includePjaxScript($templateFile)
    {
        $realScriptFile = module_path('Backend') . '/Resources/assets/scripts/'. $templateFile;
        if(is_file($realScriptFile)){
            include $realScriptFile;
        }
    }

    public function assetHash(){
        if(null == static::$hash){
            $file = __DIR__ . '/Resources/assets/hash.txt';
            if(is_file($file)){
                static::$hash = file_get_contents($file);
            }
        }
        return static::$hash;
    }
}