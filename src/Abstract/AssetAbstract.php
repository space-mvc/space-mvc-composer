<?php

namespace SpaceMvc\Framework\Abstract;

/**
 * Class AssetAbstract
 * @package SpaceMvc\Framework\Abstract
 */
abstract class AssetAbstract
{
    /** @var array $assets */
    protected array $assets = [];

    /** @var array $types */
    protected array $types = [];

    /**
     * add
     * @param $type
     * @param $url
     * @param array $attributes
     */
    abstract public function add($type, $url, $attributes = []) : self;

    /**
     * get
     * @param string|null $type
     * @return array
     */
    abstract public function get($type = null) : array;

    /**
     * render
     * @param $type
     * @return string
     */
    abstract public function render($type) : string;
}