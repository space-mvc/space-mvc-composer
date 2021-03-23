<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class EnvTest
 */
class EnvTest extends BaseTest
{
    /**
     * testEnvClass
     */
    public function testEnvClass() : void
    {
        $env = $this->app->getEnv();
        $this->assertEquals(get_class($env), 'SpaceMvc\Framework\Env');
    }

    /**
     * testEnvSet
     */
    public function testEnvSet()
    {
        $env = $this->app->getEnv();
        $this->assertEquals(get_class($env->setEnv()), 'SpaceMvc\Framework\Env');
    }

    /**
     * testEnvGet
     */
    public function testEnvGet()
    {
        $env = $this->app->getEnv();
        $this->assertEquals($env->get('DB_HOSTNAME'), '127.0.0.1');
    }

    /**
     * testEnvGetDefault
     */
    public function testEnvGetDefault()
    {
        $env = $this->app->getEnv();
        $this->assertEquals($env->get('dummy', 'dummy'), 'dummy');
    }
}
