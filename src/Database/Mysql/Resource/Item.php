<?php

namespace SpaceMvc\Framework\Database\Mysql\Resource;

use SpaceMvc\Framework\Database;

/**
 * Class Item
 * @package SpaceMvc\Framework\Database\Mysql\Resource
 */
class Item
{
    /** @var string $table */
    protected string $table = '';

    /** @var array $fillable */
    protected array $fillable = [];

    /** @var array $attributes */
    protected array $attributes = [];

    /** @var bool $saved */
    protected bool $saved;

    /**
     * getTable
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * setTable
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * getFillable
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * setFillable
     * @param array $fillable
     */
    public function setFillable(array $fillable): void
    {
        $this->fillable = $fillable;
    }

    /**
     * setAttribute
     * @param $key
     * @param $value
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * getAttributes
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * save
     * @return mixed
     */
    public function save()
    {
        $database = new Database();
        $attributes = array_filter($this->attributes);
        $db = $database->getMysql();
        $id = !empty($attributes['id']) ? $attributes['id'] : 0;
        $db->update($this->table, $id, $attributes);
        $this->saved = true;
        return $this;
    }

    /**
     * setAttributes
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * __get
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        if(!isset($this->attributes[$key])) {
            throw new \Exception($key.' key is not a valid model attribute');
        }

        return $this->attributes[$key];
    }

    /**
     * __set
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        if(!in_array($key, $this->fillable)) {
            throw new \Exception($key.' key is not in the fillable array');
        }
        return $this->setAttribute($key, $value);
    }
}