<?php

namespace SpaceMvc\Framework\Mvc;

use SpaceMvc\Framework\Mvc\Abstract\ModelAbstract;
use SpaceMvc\Framework\Database\Mysql\Resource\Item;

/**
 * Class Model
 * @package SpaceMvc\Framework\Mvc
 */
class Model extends ModelAbstract
{
    /**
     * getConn
     * @return mixed
     */
    public static function getConn(): mixed
    {
        $database = new Database();
        return $database->getMysql();
    }

    /**
     * find
     * @param $id
     * @return mixed
     */
    public static function find($id): mixed
    {
        $result = self::getConn()->find(static::$table, $id);
        $item = new Item;
        $item->setTable(static::$table);
        $item->setFillable(static::$fillable);
        $item->setAttributes($result);
        return $item;
    }

    /**
     * select
     * @param array $fields
     * @return mixed
     */
    public static function select($fields = []): mixed
    {
        return self::getConn()->select(static::$table, $fields);
    }

    /**
     * insert
     * @param array $fields
     * @return mixed
     */
    public static function insert(array $fields): mixed
    {
        return self::getConn()->insert(static::$table, $fields);
    }

    /**
     * update
     * @param array $fields
     * @return mixed
     */
    public static function update(int $id, array $data): mixed
    {
        return self::getConn()->update(static::$table, $id, $data);
    }
}
