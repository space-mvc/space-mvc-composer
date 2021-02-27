<?php

namespace SpaceMvc\Framework;

/**
 * Class Cache
 * @package SpaceMvc\Framework
 */
class Cache
{
    /** @var \Redis $redis */
    protected \Redis $redis;

    /**
     * Cache constructor.
     *
     */
    public function __construct()
    {
        $config = config('app')['cache']['redis'];

        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1', $config['port']);
        $this->redis->select($config['database']);
    }

    /**
     * setDb
     * @param int $database
     */
    public function setDb($database = 1)
    {
        $this->redis->select($database);
    }

    /**
     * getRedis
     * @return \Redis
     */
    public function getRedis() : \Redis
    {
        return $this->redis;
    }

    /**
     * set.
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value) : void
    {
        $this->redis->set($key, json_encode($value));
    }

    /**
     * get.
     *
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return json_decode($this->redis->get($key));
    }

    /**
     * delete
     * @param string $key
     */
    public function delete(string $key) : int
    {
        return $this->redis->del($key);
    }

    /**
     * flushDb
     * @return bool
     */
    public function flushDb()
    {
        return $this->redis->flushDB();
    }
}
