<?php

namespace SpaceMvc\Framework;

use SpaceMvc\Framework\Database\Mysql\Resource\Item;

/**
 * Class Model
 * @package SpaceMvc\Framework
 */
class Model
{
    /** @var string $table */
    protected static string $table = '';

    /** @var array $table */
    protected static array $fillable = [];

    /** @var Item $item */
    protected static $item;

    /**
     * getConn
     * @return mixed
     */
    public static function getConn()
    {
        $database = new Database();
        return $database->getMysql();
    }

    /**
     * find
     * @param $id
     * @return mixed
     */
    public static function find($id)
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
    public static function select($fields = [])
    {
        return self::getConn()->select(static::$table, $fields);
    }

    /**
     * insert
     * @param array $fields
     * @return mixed
     */
    public static function insert(array $fields)
    {
        return self::getConn()->insert(static::$table, $fields);
    }

    /**
     * update
     * @param array $fields
     * @return mixed
     */
    public static function update(int $id, array $data)
    {
        return self::getConn()->update(static::$table, $id, $data);
    }
}
