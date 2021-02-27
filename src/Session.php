<?php

namespace SpaceMvc\Framework;

/**
 * Class Session
 * @package SpaceMvc\Framework
 */
class Session
{
    /** @var array $session */
    protected array $session;

    /**
     * Cache constructor.
     *
     */
    public function __construct()
    {
        if(!session_id()) {
            session_start();
        }

        $this->session = $_SESSION;
    }

    /**
     * set.
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value) : void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * get.
     *
     * @param $key
     * @return mixed
     */
    public function get($key = null)
    {
        if(!$key) {
            return $_SESSION;
        }

        return $_SESSION[$key];
    }
}
