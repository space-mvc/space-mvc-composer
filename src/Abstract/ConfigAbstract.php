<?php

namespace SpaceMvc\Framework\Abstract;

/**
 * Class ConfigAbstract
 * @package SpaceMvc\Framework\Abstract
 */
abstract class ConfigAbstract
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
     * @return array
     */
    abstract public function get() : array;
}
