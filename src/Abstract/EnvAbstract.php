<?php

namespace SpaceMvc\Framework\Abstract;

/**
 * Class EnvAbstract
 * @package SpaceMvc\Framework\Abstract
 */
abstract class EnvAbstract
{
    /** @var array $env */
    protected array $env = [];

    /**
     * setEnv
     * @return $this
     */
    abstract public function setEnv() : self;

    /**
     * get
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    abstract public function get(string $key = null, mixed $default = null) : mixed;
}
