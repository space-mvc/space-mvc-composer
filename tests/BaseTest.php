<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SpaceMvc\Framework\Space;

/**
 * Class BaseTest
 */
class BaseTest extends TestCase
{
    /** @var Space $app */
    protected Space $app;

    /**
     * BaseTest constructor.
     */
    protected function setUp() : void
    {
        $this->app = new Space(false);
    }
}
