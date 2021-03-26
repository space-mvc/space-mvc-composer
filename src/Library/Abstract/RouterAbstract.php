<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class RouterAbstract
 * @package SpaceMvc\Framework\Library\Abstract
 */
abstract class RouterAbstract
{
    /** @var Request $request */
    protected $request;

    /** @var array $routes */
    protected array $routes = [];

    /** @var array $route */
    protected array $route = [];

    /**
     * initRoutes
     * @return $this
     */
    abstract public function initRoutes(): self;

    /**
     * initRoute
     * @return $this
     */
    abstract public function initRoute(): self;

    /**
     * getRoutes
     * @return array
     */
    abstract public function getRoutes(): array;

    /**
     * getRoute
     * @return array
     */
    abstract public function getRoute(): array;
}
