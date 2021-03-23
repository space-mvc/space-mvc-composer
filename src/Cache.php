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
        if(is_array($value)) {
            $value = json_encode($value);
        }

        $this->cache->set($key, $value);

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
        $value = $this->cache->get($key);

        $firstChar = substr($value, 1);
        if($firstChar == '{')
        {
            $value = json_decode($value, 1);
        }

        return $value;
    }

    /**
     * delete
     * @param string $key
     * @return mixed
     */
    public function delete(string $key) : mixed
    {
        return $this->cache->del($key);
    }

    /**
     * clear
     * @return mixed
     */
    public function clear() : mixed
    {
        return $this->cache->flushDB();
    }
}
