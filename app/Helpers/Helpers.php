<?php
namespace App\Helpers;

class Helpers {
    public static function aFunctionName()
    {
        // Xử lý hàm aFunctionName()
        dd('aFunctionName');
    }
}


if (!function_exists('env')) {
    function env()
    {
        //Xử lý hàm env()
        dd('env');
    }
}

if (!function_exists('aFunctionName')) {
    function aFunctionName()
    {
        // Xử lý hàm aFunctionName()
        dd('aFunctionName');
    }
}

//use Illuminate\Support\Facades\App;
//use Illuminate\Support\Str;
//
//
//if (!function_exists('get_current_edit_locale')) {
//    /**
//     * Get current edit locale
//     *
//     * @return string
//     */
//    function get_current_edit_locale()
//    {
//        return request('edit_locale') ?: App::getLocale();
//    }
//}
//
//if (!function_exists('get_current_edit_locale_name')) {
//    /**
//     * Get current edit locale name
//     *
//     * @return string
//     */
//    function get_current_edit_locale_name()
//    {
//        $locale = get_current_edit_locale();
//
//        $supportedLocales = config('laravellocalization.supportedLocales') ?: [];
//
//        if (isset($supportedLocales[$locale])) {
//            return $supportedLocales[$locale]['native'].' ('.$supportedLocales[$locale]['name'].')';
//        }
//
//        return Str::upper($locale);
//    }
//}

