<?php
if (! function_exists('thSort')) {
    /**
     * Generate Title for table filter.
     *
     * @param  string  $display_name
     * @param  string  $key_name
     * @return string
     */
    function thSort($display_name, $key_name)
    {
        $sort = ['sort'=>$key_name];
        $icon = '';
        if (\Request::get('order') AND \Request::get('order') == 'asc' AND $key_name == \Request::get('sort')) {
           $sort += ['order' => 'desc'];
           $icon = '-desc';
        }elseif(\Request::get('order') AND \Request::get('order') == 'desc' AND $key_name == \Request::get('sort')){
           $sort += ['order' => 'asc'];
           $icon = '-asc';
        }else{
           $sort += ['order' => 'asc'];
        }
        if (\Request::get('search')) {
            $sort = ['search' => \Request::get('search')] + $sort;
        }
    	$a = '<a href="' . route(Route::currentRouteName(), $sort) . '">
            <div>'.$display_name.'</div>
            <i class="fa fa-sort'.$icon.'"></i>
        </a>';
        return $a;
    }
}
if (! function_exists('activePrefix')) {
    /**
     * Generate Title for table filter.
     *
     * @param  string  $display_name
     * @param  string  $key_name
     * @return string
     */
    function activePrefix($prefix)
    {
        if(request()->route()->getPrefix()==$prefix){
            return ' active';
        }else {
            return '';
        }
    }
}
if (! function_exists('activeMatch')) {
    /**
     * Generate Title for table filter.
     *
     * @param  string  $display_name
     * @param  string  $key_name
     * @return string
     */
    function activeMatch($prefix)
    {
        $cadena = substr(url()->current(), strlen(url('/')), strlen(url()->current())-strlen(url('/')));
        if(preg_match("/^\\$prefix/i", $cadena)){
            return ' active';
        }else {
            return '';
        }
    }
}
use Facades\App\Libs\DPage;
if (! function_exists('dpu')) {
    /**
     * Generate Title for table filter.
     *
     * @param  string  $display_name
     * @param  string  $key_name
     * @return string
     */
    function dpu($route_name, $lang = null)
    {
        return DPage::getContent($route_name, 'url', $lang);
    }
}
if (! function_exists('activeLang')) {
    /**
     * Generate Title for table filter.
     *
     * @param  string  $display_name
     * @param  string  $key_name
     * @return string
     */
    function activeLang($lang)
    {
        $locales = ['es', 'en'];
        $default = 'es';

        if (in_array(request()->segment(1), $locales) and $lang==request()->segment(1)) {
            return ' active';
        }elseif (!in_array(request()->segment(1), $locales) and $lang==$default) {
            return ' active';
        }else{
            return '';
        }
    }
}

if (! function_exists('langChange')) {
    /**
     * Generate Title for table filter.
     *
     * @param  string  $display_name
     * @param  string  $key_name
     * @return string
     */
    function langChange($lang)
    {
        $locales = config('app.locales');
        $default = config('app.locale-default');
        if ($lang==App::getLocale()) {
            $route = Route::currentRouteName();
        } else {
            $route = $lang.'.'.Route::currentRouteName();
        }
        return route($route);
    }
}
if (! function_exists('dasset')) {
    /**
     * Generate Title for table filter.
     *
     * @param  string  $display_name
     * @param  string  $key_name
     * @return string
     */
    function dasset($asset)
    {
        if (env('ASSETS_PATH'))
            return env('ASSETS_PATH').$asset;
        return asset($asset);
    }
}
?>