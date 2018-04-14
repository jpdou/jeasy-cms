<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 14:15
 */

namespace Model\Http;


class Response
{
    protected $content='';
    public function __construct()
    {
        
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function send()
    {
        echo $this->content;
    }
}