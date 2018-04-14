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
        $path = APP_DIR. DIRECTORY_SEPARATOR. 'code'. DIRECTORY_SEPARATOR. $class. '.php';
        @include $path;
    }

    public static function get($class, $args=null)
    {
        if (Registry::has(md5($class))) {
            return Registry::get(md5($class));
        }
        $instance = self::_create($class, $args);
        Registry::set(md5($class), $instance);
        return $instance;
    }

    public static function create($class, $args=null)
    {
        return self::_create($class, $args);
    }

    protected static function _create($class, $args=null)
    {
        if ($args === null) {
            $instance = new $class;
        } else {
            $instance = new $class($args);
        }
        return $instance;
    }
}