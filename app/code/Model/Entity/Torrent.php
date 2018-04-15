<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/14
 * Time: 11:53
 */

namespace Model\Entity;

use Model\AbstractModel;
use Model\Entity\Category;

class Torrent extends AbstractModel
{
    protected $_table = 'torrent';

    public function getParentId()
    {
        return $this->getData('parent_id');
    }

    public function getSrc()
    {
        return $this->getData('src');
    }

    public function getName()
    {
        return $this->getData('name');
    }

    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }
}