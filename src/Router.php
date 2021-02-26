<?php

namespace SpaceMvc\Framework;

/**
 * Class Router
 * @package SpaceMvc\Framework
 */
class Router
{
    /** @var Request $request */
    private $request;

    /** @var array $routes */
    private $routes = [];

    /** @var array $route */
    private $route = [];

    /**
     * Router constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->initRoutes();
        $this->initRoute();
    }

    /**
     * initRoutes.
     */
    public function initRoutes() : void
    {
        $path = path('routes');
        $files = scandir($path);

        if(!empty($files)) {
            foreach($files as $file) {
                if(!in_array($file, ['.', '..'])) {
                    $this->routes = array_merge($this->routes, require_once $path.'/'.$file);
                }
            }
        }
    }

    /**
     * initRoute.
     */
    public function initRoute() : void
    {
        if(!empty($this->routes)) {
            foreach($this->routes as $route) {

                $uri = !empty($route['uri']) ? $route['uri'] : 'void';

                if($this->request->getUri() == $uri) {
                    $this->route = $route;
                }
            }
        }
    }

    /**
     * getRoutes
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * getRoute
     *
     * @return array
     */
    public function getRoute(): array
    {
        return $this->route;
    }
}
