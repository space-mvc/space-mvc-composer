<?php

namespace SpaceMvc\Framework\Abstract;

/**
 * Class ConfigAbstract
 * @package SpaceMvc\Framework\Abstract
 */
abstract class ConfigAbstract
{
    /** @var array $config */
    protected array $config = [];

    /**
     * setConfig
     * @param string $type
     * @return $this
     */
    abstract public function setConfig(string $type) : self;

    /**
     * get
     * @return array
     */
    abstract public function get() : array;
}
