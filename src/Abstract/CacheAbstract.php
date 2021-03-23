<?php

namespace SpaceMvc\Framework\Abstract;

/**
 * Class CacheAbstract
 * @package SpaceMvc\Framework\Abstract
 */
abstract class CacheAbstract
{
    /** @var $cache */
    protected $cache;

    /**
     * set
     * @param string $key
     * @param $value
     */
    abstract public function set(string $key, $value);

    /**
     * get
     * @param string $key
     */
    abstract public function get(string $key) : mixed;

    /**
     * delete
     * @param string $key
     */
    abstract public function delete(string $key) : mixed;

    /**
     * clear
     */
    public function clear() {}
}
