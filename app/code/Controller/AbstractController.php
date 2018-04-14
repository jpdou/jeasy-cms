<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 14:19
 */

namespace Controller;

use Model\Layout;

class AbstractController
{
    protected function renderPage()
    {
        /** @var Layout $layout */
        $layout = \Factory::get(Layout::class);
        $layout->render();
    }
}