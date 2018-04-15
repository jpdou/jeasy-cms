<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 14:10
 */

namespace Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Update;

class AbstractModel
{
    protected $_data = [];
    protected $_adapter;
    /**
     * @var Sql _sql
     */
    protected $_sql;
    protected $_select;
    protected $_table = '';

    public function __construct($data = [])
    {
        $this->importData($data);

        if (!\Registry::has('resource_conn')) {
            $dbConfig = \App::getConfig(\App::CONFIG_TYPE_DATABASE);
            /** @var Adapter $adapter */
            $this->_adapter = \Factory::get(Adapter::class, $dbConfig);
        }

        $this->initSql();

        return $this;
    }

    public function getId()
    {
        return (int) $this->getData('id');
    }

    public function getData($key = null)
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

    protected function initSql()
    {
        if ($this->_sql === null) {
            /** @var Sql $sql */
            $this->_sql = \Factory::get(Sql::class, $this->_adapter);
        }
    }

    public function load($value, $col='id')
    {
        $select = $this->_sql->select($this->_table);
        $select->where([$col => $value])
            ->limit(1);
        $stmt = $this->_sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        $data = $result->current() ? : [];
        $this->importData($data);
        return $this;
    }

    public function save()
    {
        if ($id = $this->getId()) {
            $sqlObj = $this->_sql->update($this->_table);
            $sqlObj->set($this->_data);
            $sqlObj->where(['id' => $id]);
        } else {
            $sqlObj = $this->_sql->insert($this->_table);
            $sqlObj->values($this->_data);
        }
        $this->_sql->prepareStatementForSqlObject($sqlObj)->execute();
    }
}