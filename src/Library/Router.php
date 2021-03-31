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
                $method = !empty($route['method']) ? $route['method'] : 'GET';

                $currentUri = $this->request->getUri();
                $routeUri = preg_replace('/{.*}/i', '___wildcard___', $uri);

                preg_match_all("|{.*}|U", $uri, $out, PREG_PATTERN_ORDER);

                $exp1 = array_filter(explode('/', $currentUri));
                $exp2 = array_filter(explode('/', $routeUri));

                if(!empty($exp1)) {
                    foreach($exp1 as $k => $v) {
                        $check = !empty($exp2[$k]) ? $exp2[$k] : 'void';
                        if($check == '___wildcard___') {

                            $exp1[$k] = '___wildcard___';

                            $key = !empty($out[0][0]) ? $out[0][0] : null;
                            $key = str_replace('{', '', $key);
                            $key = str_replace('}', '', $key);
                            $this->request->setGet($key, $v);
                        }
                    }
                }

                if(empty(array_diff($exp1, $exp2)) &&
                    strtolower($this->request->getMethod()) == strtolower($method)) {
                    $this->route = $route;
                    return $this;
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
