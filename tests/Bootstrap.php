<?php

/**
 * Class Bootstrap
 */
class Bootstrap
{
    /**
     * Bootstrap constructor.
     */
    public function __construct()
    {
        require_once __DIR__.'/../../../autoload.php';
        require_once __DIR__.'/../../../../public/helpers.php';
        require_once 'BaseTest.php';
    }
}

new Bootstrap();
