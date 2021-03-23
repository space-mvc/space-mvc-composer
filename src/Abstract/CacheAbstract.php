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
     * @param mixed $value
     * @return $this
     */
    abstract public function set(string $key, mixed $value) : self;

    /**
     * get
     * @param string $key
     * @return mixed
     */
    abstract public function get(string $key) : mixed;

    /**
     * delete
     * @param string $key
     * @return mixed
     */
    abstract public function delete(string $key) : mixed;

    /**
     * clear
     * @return mixed
     */
    abstract public function clear() : mixed;
}
