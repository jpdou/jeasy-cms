<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/15
 * Time: 9:15
 */

namespace View\Post;

use View\AbstractView;
use Model\Entity\Post;

class View extends AbstractView
{
    /**
     * @var Post
     */
    protected $_post;

    public function __construct($args)
    {
        $this->_post = \Registry::get('current_post');
        return parent::__construct($args);
    }

    public function getTitle()
    {
        return $this->_post->getTitle();
    }

    public function getContent()
    {
        return $this->_post->getContent();
    }

    public function getCreatedAt()
    {
        return $this->_post->getCreatedAt();
    }
}