<?php
namespace App\Http\Controllers\Backend;

class DashboardController extends BaseController
{
    public function __construct()
    {
        self::setMenuUri('/dashboard');
    }

    /**
     * backend index
     * @return string
     */
    public function index(){
        $envs = [
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => array_get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];

        /////
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];
        return $this->view('backend.dashboard.index', compact('envs', 'dependencies'));
    }

    public function test(){
        return __('test');
    }
}
