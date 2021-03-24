<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class ExceptionAbstract
 * @package SpaceMvc\Framework\Library\Abstract
 */
abstract class ExceptionAbstract
{
    /**
     * throw
     * @param string $message
     * @param int $code
     */
    abstract public function throw(string $message, int $code = 500) : void;

    /**
     * throwJson
     * @param string $message
     * @param int $code
     */
    abstract public function throwJson(string $message, int $code = 500) : void;
}
