<?php
use App\Settings;
use App\Widgets;

 
if (! function_exists('getcong')) {

    function getcong($key)
    {
    	 
        $settings = Settings::findOrFail('1'); 

        return $settings->$key;
    }
}

if (! function_exists('getcong_widgets')) {

    function getcong_widgets($key)
    {
    	 
        $widgets = Widgets::findOrFail('1'); 

        return $widgets->$key;
    }
}


if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}
