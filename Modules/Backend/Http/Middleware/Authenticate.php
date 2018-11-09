<?php

namespace Modules\Backend\Http\Middleware;

use Closure;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Backend::auth()->guest() && !$this->shouldPassThrough($request)) {
            return redirect()->guest(\Backend::baseUrl() . 'login');
        }

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through verification.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        $excepts = [
            'backend/login',
            'backend/logout',
        ];

        $uri = $request->getPathInfo();
        $keys = \LaravelLocalization::getSupportedLanguagesKeys();
        $pattern = '/^\/?('.implode('|', $keys) . ')\/?/';
        $uri = trim(preg_replace($pattern, '',$uri),'/');
        if(in_array($uri, $excepts)){
            return true;
        }

        return false;
    }
}
