<?php
namespace App\Helpers;

use Auth;
use App\Models\Menu;

class Backend
{

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
        return config('admin.title');
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
    function baseUrl($path = '')
    {
        $prefix = '/'.trim(config('backend.prefix'), '/');

        $prefix = ($prefix == '/') ? '' : $prefix;

        return $prefix.'/'.trim($path, '/');
    }
}