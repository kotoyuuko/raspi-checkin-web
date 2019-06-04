<?php

if (!function_exists('route_class')) {
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}

if (!function_exists('send_fingerprint_request')) {
    function send_fingerprint_request($ip, $port, $request_id)
    {
        file_get_contents('http://' . $ip . ':' . $port . '/' . $request_id);
    }
}
