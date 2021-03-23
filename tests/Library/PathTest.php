<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class PathTest
 */
class PathTest extends BaseTest
{
    /**
     * testPathGet
     */
    public function testPathGet() : void
    {
        $path = $this->app->getPath();
        $this->assertStringContainsString('public', $path->get()['public']);
    }
}
