<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class SessionAbstract
 * @package SpaceMvc\Framework\Library\Abstract
 */
abstract class SessionAbstract
{
    /** @var array $data */
    protected array $data;

    /**
     * setSession
     * @return $this
     */
    abstract public function setSession() : self;

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
}
