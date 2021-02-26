<?php

namespace SpaceMvc\Framework;

/**
 * Class Cache
 * @package SpaceMvc\Framework
 */
class Cache
{
    /** @var Predis\Client $redis */
    protected $redis;

    /** @var string $host */
    protected $host = '127.0.0.1';

    /** @var int $port */
    protected $port = 6379;

    /**
     * Cache constructor.
     *
     */
    public function __construct()
    {
        $config = config('app');
        $this->redis = new \Predis\Client([
            'scheme' => 'tcp',
            'host'   => (int) $config['cache']['redis']['hostname'],
            'port'   => $config['cache']['redis']['port'],
        ]);
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
}
