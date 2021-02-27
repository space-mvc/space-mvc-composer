<?php

namespace SpaceMvc\Framework;

/**
 * Class Exception
 * @package SpaceMvc\Framework
 */
class Exception
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
    public function throwJson($message = "", $code = 0) :void
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