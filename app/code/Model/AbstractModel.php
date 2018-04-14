<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 14:10
 */

namespace Model;


class AbstractModel
{
    protected $_data = [];

    public function __construct($data=[])
    {
        $this->importData($data);
        return $this;
    }

    public function getData($key=null)
    {
        if ($key === null) {
            return $this->_data;
        } else if ($key) {
            return isset($this->_data[$key]) ? $this->_data[$key] : null;
        }
        return null;
    }

    public function setData($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }

    public function importData($data)
    {
        if (!is_array($data)) {
            throw new \Exception('import model data require array');
        }
        $this->_data = $data;
        return $this;
    }

    public function unsetData($key)
    {
        unset($this->_data[$key]);
        return $this;
    }
}