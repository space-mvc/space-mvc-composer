<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class AssetTest
 * @package SpaceMVC\Framework\Tests
 */
class AssetTest extends BaseTest
{
    /**
     * testAssetClass
     */
    public function testAssetClass() : void
    {
        $asset = $this->app->getAsset();
        $this->assertEquals(get_class($asset), 'SpaceMvc\Framework\Library\Asset');
    }

    /**
     * testAssetGetDefault
     */
    public function testAssetGetDefault() : void
    {
        $asset = $this->app->getAsset();
        $this->assertEquals($asset->get(), []);
    }

    /**
     * testAssetAdd
     */
    public function testAssetAdd() : void
    {
        $asset = $this->app->getAsset();
        $this->assertEquals(get_class($asset->add('css', '/assets/css/example.css')), 'SpaceMvc\Framework\Library\Asset');
        $this->assertEquals(get_class($asset->add('js', '/assets/js/example.js')), 'SpaceMvc\Framework\Library\Asset');
    }

    /**
     * testAssetGet
     */
    public function testAssetGet() : void
    {
        $asset = $this->app->getAsset();
        $asset->add('css', '/assets/css/example.css');
        $asset->add('js', '/assets/js/example.js');

        $data = [
            'css' => [
                [
                    'url' => '/assets/css/example.css',
                    'attributes' => []
                ]
            ],
            'js' => [
                [
                    'url' => '/assets/js/example.js',
                    'attributes' => []
                ]
            ]
        ];

        $this->assertEquals($asset->get(), $data);
    }

    /**
     * testAssetGetCss
     */
    public function testAssetGetCss() : void
    {
        $asset = $this->app->getAsset();
        $asset->add('css', '/assets/css/example.css');

        $data = [
            [
                'url' => '/assets/css/example.css',
                'attributes' => []
            ]
        ];

        $this->assertEquals($asset->get('css'), $data);
    }

    /**
     * testAssetGetJs
     */
    public function testAssetGetJs() : void
    {
        $asset = $this->app->getAsset();
        $asset->add('js', '/assets/js/example.js');

        $data = [
            [
                'url' => '/assets/js/example.js',
                'attributes' => []
            ]
        ];

        $this->assertEquals($asset->get('js'), $data);
    }
}
