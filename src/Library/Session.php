<?php

namespace SpaceMvc\Framework\Library;

use SpaceMvc\Framework\Library\Abstract\SessionAbstract;

/**
 * Class Session
 * @package SpaceMvc\Framework\Library
 */
class Session extends SessionAbstract
{
    /**
     * Cache constructor.
     *
     */
    public function __construct()
    {
        $this->setSession();
    }

    /**
     * setSession
     * @return $this
     */
    public function setSession() : self
    {
        $mode = php_sapi_name();

        if($mode !== 'cli') {
            if(!session_id()) {
                session_start();
            }
            $this->data = $_SESSION;
        }

        return $this;
    }

    /**
     * set
     * @param $key
     * @param $value
     * @return $this
     */
    public function set(string $key, mixed $value) : self
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
    public function get(string $key = null) : mixed
    {
        if(!$key) {
            return $this->data;
        }

        return $this->data[$key];
    }
}
