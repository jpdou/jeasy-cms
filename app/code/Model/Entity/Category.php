<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 11:53
 */

namespace Model\Entity;

use \Model\AbstractModel;

class Category extends AbstractModel
{
    protected $_table = 'category';

    public function getUrl()
    {
        return \App::getBaseUrl(). $this->getUrlKey() . '.html';
    }

    public function getUrlKey()
    {
        return $this->getData('url_key');
    }

    public function getName()
    {
        return $this->getData('name');
    }

    public function getDescription()
    {
        return $this->getData('description');
    }

    public function getLevel()
    {
        return $this->getData('level');
    }

    public function getParentId()
    {
        return $this->getData('parent_id');
    }

    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    public function getUpdatedAt()
    {
        return $this->getData('updated_at');
    }
}