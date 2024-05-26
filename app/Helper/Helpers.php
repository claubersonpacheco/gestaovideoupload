<?php

use App\Models\Setting;

if (!function_exists('setting')){

    function setting(){

        $setting = Setting::where('id' , '1')->first();

        return $setting;
    }

}

if (!function_exists('authenticMoodle')) {
    function authenticMoodle($username, $password)
    {
        $usuario = new \App\Models\User();

        $user = $username;
        $pass = $password;

        $usuario->userAuthenticate($user, $pass);

        return $usuario;

    }
}

