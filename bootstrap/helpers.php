<?php


function backend_auth(){
    return Auth::guard('admin_guard');
}