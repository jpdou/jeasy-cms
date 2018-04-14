<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 7:42
 */

namespace View;

use Model\Layout;

class AbstractView
{
    protected $_template = '';
    protected $_name_in_layout = '';
    protected $_sub_blocks = [];

    public function __construct($args)
    {
        if (isset($args['template'])) {
            $this->_template = $args['template'];
        }
        if (isset($args['name'])) {
            $this->_name_in_layout = $args['name'];
        }
        $layout = $this->getLayout();

        if ($this->_name_in_layout) {
            $this->_sub_blocks = $layout->getBlocksByParent($this->_name_in_layout);
        }

        $this->_init();
    }

    public function setTemplate($template)
    {
        $this->_template = $template;
        return $this;
    }

    protected function _init()
    {
        return $this;
    }

    /**
     * @return AbstractView[]
     */
    public function getSubBlocks()
    {
        return $this->_sub_blocks;
    }

    /**
     * @param $name
     * @return AbstractView
     */
    public function getSubBlock($name)
    {
        $layout = $this->getLayout();
        return $layout->getBlock($name);
    }

    protected function render()
    {
        $template = $this->getTemplateFile();
        $html = '';
        if ($template) {
            ob_start();
            include $template;
            $html = ob_get_clean();
        }
        return $html;
    }

    public function getNameInLayout()
    {
        return $this->_name_in_layout;
    }

    protected function getTemplateFile()
    {
        if ($this->_template) {
            return APP_DIR.DIRECTORY_SEPARATOR.'design'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$this->_template;
        }
        return '';
    }

    public function toHtml()
    {
        return $this->render();
    }

    /**
     * @return Layout
     */
    public function getLayout()
    {
        return \Factory::get(Layout::class);
    }
}