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
    const CONFIG_TYPE_APP = 'app';

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

    public static function getBaseUrl()
    {
        return self::getConfig(self::CONFIG_TYPE_APP)['base_url'];
    }

    public static function run()
    {
        self::initConfig();

        self::dispatchRequest();

    }

    protected static function dispatchRequest()
    {
        $request = self::getRequest();
        $controller = Factory::get('Controller\\'. $request->getControllerName(). 'Controller');
        $action = $request->getActionName();
        if (is_callable([$controller, $action])) {
            call_user_func([$controller, $action]);
        } else {
            echo '404';
            // todo 404
        }
        $response = self::getResponse();
        $response->send();
    }

    /**
     * @return \Model\Http\Request
     */
    public static function getRequest()
    {
        return Factory::get(\Model\Http\Request::class);
    }

    /**
     * @return \Model\Http\Response
     */
    public static function getResponse()
    {
        return Factory::get(\Model\Http\Response::class);
    }
}