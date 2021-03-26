<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class PathTest
 */
class PathTest extends BaseTest
{
    /**
     * testPathClass
     */
    public function testPathClass() : void
    {
        $path = $this->app->getPath();
        $this->assertEquals(get_class($path), 'SpaceMvc\Framework\Library\Path');
    }
    
    /**
     * testPathGet
     */
    public function testPathGet() : void
    {
        $path = $this->app->getPath();
        $this->assertStringContainsString('public', $path->get()['public']);
    }
}
