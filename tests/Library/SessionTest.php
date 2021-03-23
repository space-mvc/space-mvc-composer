<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class SessionTest
 */
class SessionTest extends BaseTest
{
    /**
     * testSessionClass
     */
    public function testSessionClass() : void
    {
        $session = $this->app->getSession();
        $this->assertEquals(get_class($session), 'SpaceMvc\Framework\Library\Session');
    }

    /**
     * testSessionSet
     */
    public function testEnvSet()
    {
        $session = $this->app->getSession();
        $this->assertEquals(get_class($session->setSession()), 'SpaceMvc\Framework\Library\Session');
    }

    /**
     * testSessionGet
     */
    public function testSessionGet()
    {
        $session = $this->app->getSession();
        $session->set('key1', 'value1');

        $data = [
            'key1' => 'value1'
        ];
        $this->assertEquals($session->get(), $data);
    }

    /**
     * testSessionGetByKey
     */
    public function testSessionGetByKey()
    {
        $session = $this->app->getSession();
        $session->set('key1', 'value1');
        $this->assertEquals($session->get('key1'), 'value1');
    }
}
