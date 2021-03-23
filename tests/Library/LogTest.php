<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class LogTest
 */
class LogTest extends BaseTest
{
    /**
     * testLogClass
     */
    public function testLogClass() : void
    {
        $log = $this->app->getLog();
        $this->assertEquals(get_class($log), 'SpaceMvc\Framework\Library\Log');
    }

    /**
     * testLogWrite
     */
    public function testLogWrite() : void
    {
        $log = $this->app->getLog();
        $this->assertEquals(get_class($log->write('unit-test')), 'SpaceMvc\Framework\Library\Log');
    }
}
