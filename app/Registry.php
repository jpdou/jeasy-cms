<?php

/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 12:21
 */
class Registry
{
    protected static $data = [];

    static public function set($key, $value)
    {
        if (isset(self::$data[$key])) {
            throw new Exception('Can\'t duplicate register');
        }
        self::$data[$key] = $value;
    }

    public static function update($key, $value)
    {
        self::$data[$key] = $value;
    }

    public static function get($key)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    public static function uns($key)
    {
        if (isset(self::$data[$key])) {
            unset(self::$data[$key]);
        }
    }
}