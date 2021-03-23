<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class CacheTest
 */
class CacheTest extends BaseTest
{
    /**
     * testCacheClass
     */
    public function testCacheClass() : void
    {
        $cache = $this->app->getCache();
        $this->assertEquals(get_class($cache), 'SpaceMvc\Framework\Cache');
    }

    /**
     * testCacheSet
     */
    public function testCacheSet() : void
    {
        $cache = $this->app->getCache();
        $this->assertEquals(get_class($cache->set('key1', 'value1')), 'SpaceMvc\Framework\Cache');
    }

    /**
     * testCacheGet
     */
    public function testCacheGet() : void
    {
        $cache = $this->app->getCache();
        $cache->set('key1', 'value1');
        $this->assertEquals($cache->get('key1'), 'value1');
    }

    /**
     * testCacheDelete
     */
    public function testCacheDelete() : void
    {
        $cache = $this->app->getCache();
        $cache->set('key1', 'value1');
        $cache->delete('key1');
        $this->assertEquals($cache->get('key1'), null);
    }

    /**
     * testCacheClear
     */
    public function testCacheClear() : void
    {
        $cache = $this->app->getCache();
        $this->assertEquals($cache->clear(), true);
    }
}
