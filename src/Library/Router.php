<?php

namespace SpaceMvc\Framework\Library;

use SpaceMvc\Framework\Library\Abstract\RouterAbstract;

/**
 * Class Router
 * @package SpaceMvc\Framework\Library
 */
class Router extends RouterAbstract
{
    /**
     * Router constructor.
     * @param Path $path
     * @param Request $request
     */
    public function __construct(Path $path, Request $request)
    {
        $this->path = $path;
        $this->request = $request;
        $this->initRoutes();
        $this->initRoute();
    }

    /**
     * initRoutes
     * @return $this
     */
    public function initRoutes(): self
    {
        $path = $this->path->get('routes');
        $files = scandir($path);

        if(!empty($files)) {
            foreach($files as $file) {
                if(!in_array($file, ['.', '..'])) {
                    $this->routes = array_merge($this->routes, require $path.'/'.$file);
                }
            }
        }
        return $this;
    }

    /**
     * initRoute
     * @return $this
     */
    public function initRoute(): self
    {
        if(!empty($this->routes)) {
            foreach($this->routes as $route) {

                $uri = !empty($route['uri']) ? $route['uri'] : 'void';

                if($this->request->getUri() == $uri) {
                    $this->route = $route;
                }
            }
        }
        return $this;
    }

    /**
     * getRoutes
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * getRoute
     * @return array
     */
    public function getRoute(): array
    {
        return $this->route;
    }
}
