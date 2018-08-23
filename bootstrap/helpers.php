<?php

/**
 * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
 */
function backend_auth(){
    return Auth::guard(config('backend.guard_name'));
}

function base_url(){
    return '/'. config('backend.prefix');
}
