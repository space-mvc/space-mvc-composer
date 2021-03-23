<?php

namespace SpaceMvc\Framework;

use SpaceMvc\Framework\Abstract\CacheAbstract;

/**
 * Class Cache
 * @package SpaceMvc\Framework
 */
class Cache extends CacheAbstract
{
    /**
     * Cache constructor.
     *
     */
    public function __construct()
    {
        $config = config('app')['cache']['redis'];

        $this->cache = new \Redis();
        $this->cache->connect('127.0.0.1', $config['port']);
        $this->cache->select($config['database']);
    }

    /**
     *
     * @param $key
     * @param $value
     * @return Cache
     */
    public function set($key, $value) : Cache
    {
        $this->cache->set($key, json_encode($value));
        return $this;
    }

    /**
     * get.
     *
     * @param $key
     * @return mixed
     */
    public function get($key) : mixed
    {
        return json_decode($this->cache->get($key));
    }

    /**
     * delete
     * @param string $key
     */
    public function delete(string $key) : int
    {
        return $this->cache->del($key);
    }

    /**
     * clear
     * @return mixed
     */
    public function clear()
    {
        return $this->cache->flushDB();
    }
}
