<?php

namespace SpaceMvc\Framework\Abstract;

/**
 * Class SessionAbstract
 * @package SpaceMvc\Framework\Abstract
 */
abstract class SessionAbstract
{
    /** @var array $data */
    protected array $data;

    /**
     * loadData
     * @return $this
     */
    abstract public function loadData() : self;

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
