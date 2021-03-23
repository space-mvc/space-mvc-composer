<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class LogAbstract
 * @package SpaceMvc\Framework\Library\Abstract
 */
abstract class LogAbstract
{
    /**
     * write
     * @param mixed $data
     * @param string $type
     * @return $this
     */
    abstract public function write(mixed $data, string $type) : self;
}
