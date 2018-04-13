<?php

/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 12:16
 */
class App
{
    const CONFIG_TYPE_DATABASE = 'database';

    protected static $_config;

    public static function getConfig($type)
    {
        return isset(self::$_config[$type]) ? self::$_config[$type] : [];
    }

    protected static function initConfig()
    {
        if (self::$_config === null) {
            self::$_config = require 'config.php';
        }
    }

    public static function run()
    {
        self::initConfig();

        self::dispatchRequest();

    }

    protected static function dispatchRequest()
    {
        $request = self::getRequest();
        var_dump($_SERVER);
        exit();
    }

    public static function getRequest()
    {
        $request = Registry::get('http_request_instance');
        if ($request === null) {
            $request = new \Model\Http\Request();
            Registry::set('http_request_instance', $request);
        }
        return $request;
    }

    public static function getResponse()
    {
        $response = Registry::get('http_response_instance');
        if ($response === null) {
            $response = new \Model\Http\Response();
            Registry::set('http_response_instance', $response);
        }
        return $response;
    }
}