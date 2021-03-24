<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class ExceptionTest
 */
class ExceptionTest extends BaseTest
{
    /**
     * testAssetClass
     */
    public function testExceptionClass() : void
    {
        $exception = $this->app->getException();
        $this->assertEquals(get_class($exception), 'SpaceMvc\Framework\Library\Exception');
    }

    /**
     * testExceptionThrow
     * @throws Exception
     */
    public function testExceptionThrow() : void
    {
        try {
            $mock = $this->createMock('SpaceMvc\Framework\Library\Exception');
            $mock->expects($this->once())
                ->method('throw')
                ->willThrowException(new \Exception('phpunit-test'));
            $mock->throw('phpunit-test', 501);

        } catch(Exception $e) {
            $this->assertEquals($e->getMessage(), 'phpunit-test');
        }
    }

    /**
     * testExceptionThrowJson
     */
    public function testExceptionThrowJson() : void
    {
        try {
            $mock = $this->createMock('SpaceMvc\Framework\Library\Exception');
            $mock->expects($this->once())
                ->method('throwJson');
            $mock->throwJson('phpunit-test', 501);

        } catch(Exception $e) {
            $this->assertEquals($e->getMessage(), 'phpunit-test');
        }
    }
}
