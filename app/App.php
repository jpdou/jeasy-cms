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

    protected $_config;

    public function getConfig($type)
    {
        return isset($this->_config[$type]) ? $this->_config[$type] : [];
    }

    protected function initConfig()
    {
        if ($this->_config === null) {
            $this->_config = require 'config.php';
        }
    }

    public function run()
    {
        $this->initConfig();
    }
}