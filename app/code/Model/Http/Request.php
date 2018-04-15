<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 14:15
 */

namespace Model\Http;


class Request
{
    protected $_actions = [
        0 => 'index',
        1 => 'index',
    ];
    
    protected $_params = [];

    public function __construct()
    {
        $requestUri = trim($_SERVER['REQUEST_URI'], '/');
        $requestUris = explode('/', $requestUri);
        $requestUrisCount = count($requestUris);

        if ($requestUrisCount === 1) {
            if ($requestUris[0]) {
                $this->_actions[0] = $requestUris[0];
            }
        } else {
            $this->_actions[0] = array_shift($requestUris);
            $this->_actions[1] = array_shift($requestUris);
            $this->_params = $requestUris;
        }
    }

    public function getFullActionName()
    {
        return implode('_', $this->_actions);
    }

    public function getControllerName()
    {
        return ucfirst($this->_actions[0]);
    }

    public function getActionName()
    {
        return ucfirst($this->_actions[1]);
    }

    public function getParams()
    {
        return $this->_params;
    }

    public function getParam($key)
    {
        return isset($this->_params[$key]) ? $this->_params[$key] : null;
    }
}