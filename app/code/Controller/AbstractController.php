<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 14:19
 */

namespace Controller;

use Model\Layout;
use Model\Http\Request;

class AbstractController
{
    /**
     * @return Layout
     */
    protected function getLayout()
    {
        return \Factory::get(Layout::class);
    }

    protected function renderPage()
    {
        $this->getLayout()->render();
    }

    /**
     * @return Request
     */
    protected function getRequest()
    {
        return \Factory::get(Request::class);
    }
}