<?php

namespace SpaceMvc\Framework\Abstract;

/**
 * Class EnvAbstract
 * @package SpaceMvc\Framework\Abstract
 */
abstract class EnvAbstract
{
    /** @var array $data */
    protected array $data = [];

    /**
     * loadData
     * @return $this
     */
    abstract public function loadData() : self;

    /**
     * get
     * @param null $key
     * @param null $default
     * @return mixed
     */
    abstract public function get($key = null, $default = null) : mixed;
}
