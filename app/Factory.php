<?php

/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 18:27
 */
class Factory
{
    public static function autoload($class)
    {
        $path = APP_DIR. DIRECTORY_SEPARATOR. $class. '.php';
        @include $path;
    }
}