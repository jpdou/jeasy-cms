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
    protected $actions = [
        0 => 'index',
        1 => 'index',
    ];

    public function __construct()
    {
        $requestUri = trim($_SERVER['REQUEST_URI'], '/');
        $requestUris = explode('/', $requestUri);
        $requestUrisCount = count($requestUris);

        if ($requestUrisCount === 1) {
            if ($requestUris[0]) {
                $this->actions[0] = $requestUris[0];
            }
        } else {
            $this->actions[0] = $requestUris[0];
            $this->actions[1] = $requestUris[1];
        }
    }

    public function getFullActionName()
    {
        return implode('_', $this->actions);
    }

    public function getControllerName()
    {
        return ucfirst($this->actions[0]);
    }

    public function getActionName()
    {
        return ucfirst($this->actions[1]);
    }
}