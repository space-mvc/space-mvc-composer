<?php

namespace SpaceMvc\Framework\Library;

use SpaceMvc\Framework\Library\Abstract\ExceptionAbstract;

/**
 * Class Exception
 * @package SpaceMvc\Framework\Library
 */
class Exception extends ExceptionAbstract
{
    /**
     * throw
     * @param string $message
     * @param int $code
     * @throws \Exception
     */
    public function throw($message = "", $code = 0) : void
    {
        throw new \Exception($message, $code);
    }

    /**
     * throwJson.
     *
     * @param string $message
     * @param int $code
     */
    public function throwJson($message = "", $code = 0) : void
    {
        echo json_encode([
            'exception' => [
                'message' => $message,
                'code' => $code
            ]
        ]);
        exit;
    }
}