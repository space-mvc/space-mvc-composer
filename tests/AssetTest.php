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
     * testAddAsset
     */
    public function testAddAsset(): void
    {
        // get asset class
        $asset = $this->app->getAsset();

        // test class
        $this->assertEquals(get_class($asset), 'SpaceMvc\Framework\Asset');

        // test assets get default
        $this->assertEquals($asset->get(), []);

        // test assets add
        $this->assertEquals(get_class($asset->add('css', '/assets/css/example.css')), 'SpaceMvc\Framework\Asset');
        $this->assertEquals(get_class($asset->add('js', '/assets/js/example.js')), 'SpaceMvc\Framework\Asset');

        // test assets get
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

        // test assets get css
        $data = [
            [
                'url' => '/assets/css/example.css',
                'attributes' => []
            ]
        ];
        $this->assertEquals($asset->get('css'), $data);

        // test assets get js
        $data = [
            [
                'url' => '/assets/js/example.js',
                'attributes' => []
            ]
        ];
        $this->assertEquals($asset->get('js'), $data);
    }
}
