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
    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}