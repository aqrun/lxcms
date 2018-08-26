<?php
namespace App\Http\Controllers\Backend;

class DashboardController extends BaseController
{

    /**
     * backend index
     * @return string
     */
    public function index(){
        \Debugbar::info(\Backend::menu());
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

        $extensions = [
            'helpers' => [
                'name' => 'laravel-admin-ext/helpers',
                'link' => 'https://github.com/laravel-admin-extensions/helpers',
                'icon' => 'gears',
            ],
            'log-viewer' => [
                'name' => 'laravel-admin-ext/log-viewer',
                'link' => 'https://github.com/laravel-admin-extensions/log-viewer',
                'icon' => 'database',
            ],
            'backup' => [
                'name' => 'laravel-admin-ext/backup',
                'link' => 'https://github.com/laravel-admin-extensions/backup',
                'icon' => 'copy',
            ],
            'config' => [
                'name' => 'laravel-admin-ext/config',
                'link' => 'https://github.com/laravel-admin-extensions/config',
                'icon' => 'toggle-on',
            ],
            'api-tester' => [
                'name' => 'laravel-admin-ext/api-tester',
                'link' => 'https://github.com/laravel-admin-extensions/api-tester',
                'icon' => 'sliders',
            ],
            'media-manager' => [
                'name' => 'laravel-admin-ext/media-manager',
                'link' => 'https://github.com/laravel-admin-extensions/media-manager',
                'icon' => 'file',
            ],
            'scheduling' => [
                'name' => 'laravel-admin-ext/scheduling',
                'link' => 'https://github.com/laravel-admin-extensions/scheduling',
                'icon' => 'clock-o',
            ],
            'reporter' => [
                'name' => 'laravel-admin-ext/reporter',
                'link' => 'https://github.com/laravel-admin-extensions/reporter',
                'icon' => 'bug',
            ],
            'redis-manager' => [
                'name' => 'laravel-admin-ext/redis-manager',
                'link' => 'https://github.com/laravel-admin-extensions/redis-manager',
                'icon' => 'flask',
            ],
        ];

        foreach ($extensions as &$extension) {
            $name = explode('/', $extension['name']);
            $extension['installed'] = false;
        }

        /////
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];
        return view('backend.dashboard.index', compact('envs', 'extensions', 'dependencies'));
    }

    public function test(){
        return __('test');
    }
}
