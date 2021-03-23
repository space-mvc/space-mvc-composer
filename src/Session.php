<?php

namespace SpaceMvc\Framework;

use SpaceMvc\Framework\Abstract\SessionAbstract;;

/**
 * Class Session
 * @package SpaceMvc\Framework
 */
class Session extends SessionAbstract
{
    /**
     * Cache constructor.
     *
     */
    public function __construct()
    {
        $this->loadData();
    }

    /**
     * loadData
     * @return $this
     */
    public function loadData() : self
    {
        if(!session_id()) {
            session_start();
        }

        $this->data = $_SESSION;
        return $this;
    }

    /**
     * set
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value) : self
    {
        $_SESSION[$key] = $value;

        $this->data[$key] = $value;

        return $this;
    }

    /**
     * get.
     *
     * @param $key
     * @return mixed
     */
    public function get($key = null) : mixed
    {
        if(!$key) {
            return $this->data;
        }

        return $this->data[$key];
    }
}
