<?php

/**
 * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
 */
function backend_auth(){
    return Auth::guard('admin_guard');
}
