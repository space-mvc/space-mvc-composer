<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class ConfigTest
 */
class ConfigTest extends BaseTest
{
    /**
     * testConfigClass
     */
    public function testConfigClass() : void
    {
        $config = $this->app->getConfig();
        $this->assertEquals(get_class($config), 'SpaceMvc\Framework\Library\Config');
    }

    /**
     * testConfigSet
     * @throws Exception
     */
    public function testConfigSet() : void
    {
        $config = $this->app->getConfig();
        $this->assertEquals(get_class($config->setConfig('paths')), 'SpaceMvc\Framework\Library\Config');
    }

    /**
     * testConfigGet
     * @throws Exception
     */
    public function testConfigGet()
    {
        $config = $this->app->getConfig();
        $config->setConfig('paths');
        $this->assertStringContainsString( 'public', $config->get()['public']);
    }
}
