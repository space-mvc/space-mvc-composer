<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class EnvAbstract
 * @package SpaceMvc\Framework\Library\Abstract
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
