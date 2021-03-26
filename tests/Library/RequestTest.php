<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 */
class RequestTest extends BaseTest
{
    /**
     * testRequestClass
     */
    public function testRequestClass() : void
    {
        $request = $this->app->getRequest();
        $this->assertEquals(get_class($request), 'SpaceMvc\Framework\Library\Request');
    }

    /**
     * testRequestGetUri
     */
    public function testRequestGetUri() : void
    {
        $request = $this->app->getRequest();
        $this->assertEquals($request->getUri(), '');
    }

    /**
     * testRequestGetMethod
     */
    public function testRequestGetMethod() : void
    {
        $request = $this->app->getRequest();
        $this->assertEquals($request->getMethod(), '');
    }

    /**
     * testRequestGet
     */
    public function testRequestGet() : void
    {
        $request = $this->app->getRequest();
        $this->assertEquals($request->get(), []);
    }

    /**
     * testRequestPost
     */
    public function testRequestPost() : void
    {
        $request = $this->app->getRequest();
        $this->assertEquals($request->post(), []);
    }
}
