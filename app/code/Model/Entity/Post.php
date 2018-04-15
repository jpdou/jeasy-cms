<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 11:53
 */

namespace Model\Entity;

use Model\AbstractModel;

class Post extends AbstractModel
{
    protected $_table = 'post';

    protected $_category;

    public function getUrl()
    {
        return \App::getBaseUrl(). $this->getUrlKey() . '.html';
    }

    public function getCategory()
    {
        if ($this->_category === null) {
            if ($categoryId = $this->getCategoryId()) {
                /** @var Category $category */
                $category = \Factory::create(Category::class);
                $category->load($categoryId);
                if ($category->getId()) {
                    $this->_category = $category;
                }
            }
        }
        return $this->_category;
    }

    public function getCategoryId()
    {
        return $this->getData('category_id');
    }

    public function getUrlKey()
    {
        return $this->getData('url_key');
    }

    public function getTitle()
    {
        return $this->getData('title');
    }

    public function getKeywords()
    {
        return $this->getData('keywords');
    }

    public function getDescription()
    {
        return $this->getData('description');
    }

    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    public function getUpdatedAt()
    {
        return $this->getData('updated_at');
    }

    public function getContent()
    {
        return $this->getData('content');
    }
}