<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 9:03
 */

namespace Model;


use View\AbstractView;

class Layout extends AbstractModel
{
    protected $_blocks = [];
    protected $_request;
    protected $_handles = [];

    public function __construct(array $data = [])
    {
        $this->_request = \App::getRequest();

        array_push($this->_handles, 'default');
        array_push($this->_handles, $this->_request->getFullActionName());

        parent::__construct($data);
    }

    public function render()
    {
        foreach ($this->_handles as $handle) {
            $file = APP_DIR. DIRECTORY_SEPARATOR. 'design' .DIRECTORY_SEPARATOR. 'layout'. DIRECTORY_SEPARATOR. $handle . '.xml';
            if (file_exists($file)) {
                $simpleXml = simplexml_load_file($file);
                $this->_parseXml($simpleXml);
            }
        }

        foreach ($this->_blocks as $name => $_block) {
            $class = isset($_block['class']) ? $_block['class'] : AbstractView::class;
            $block = \Factory::create($class, $_block);
            $this->_blocks[$name]['instance'] = $block;
        }

        /** @var AbstractView $page */
        $page = \Factory::get(AbstractView::class, ['template' => 'page.php']);
        /** @var \Model\Http\Response $response */
        $response = \Factory::get(\Model\Http\Response::class);
        $response->setContent($page->toHtml());
    }

    protected function _parseXml(\SimpleXMLElement $simpleXml, $parent=null)
    {
        $name = '';
        if ($simpleXml->getName() === 'block') {
            $attributes = [];
            foreach ($simpleXml->attributes() as $attribute => $value) {
                $attributes[$attribute] = (string) $value;
            }
            $class = isset($attributes['class']) ? $attributes['class'] : null;
            $template = isset($attributes['template']) ? $attributes['template'] : null;
            $name = $attributes['name'];
            $this->addBlock($name, $class, $template, $parent);
        }
        if ($simpleXml->count()) {
            foreach ($simpleXml->children() as $item) {
                $this->_parseXml($item, $name);
            }
        }
    }

    /**
     * @param string $name
     * @param string $class
     * @param string $template
     * @param string $parent
     * @return $this
     */
    public function addBlock($name, $class=null, $template=null, $parent=null)
    {
        $this->_blocks[$name] = [
            'class'     => $class,
            'template'  => $template,
            'parent'    => $parent
        ];
        return $this;
    }

    public function getBlocksByParent($parent)
    {
        $blocks = [];
        foreach ($this->_blocks as $block) {
            if ($block['parent'] === $parent) {
                array_push($blocks, $block);
            }
        }
        return $blocks;
    }

    public function getBlock($name)
    {
        if (isset($this->_blocks[$name])) {
            return $this->_blocks[$name]['instance'];
        }
        return null;
    }

    /**
     * @param string $name
     * @param $value
     * @return Layout
     */
    public function setPageData($name, $value)
    {
        \Registry::update('page_'. $name, $value);
        return $this;
    }

    public function getPageData($name)
    {
        return \Registry::get('page_'. $name);
    }
}