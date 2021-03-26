<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class PathAbstract
 * @package SpaceMvc\Framework\Library\Abstract
 */
abstract class PathAbstract
{
    /**
     * get
     * @param string|null $key
     * @return mixed
     */
    abstract public function get($key = null): mixed;
}
