<?php

namespace SpaceMvc\Framework;

/**
 * Class Space
 * @package SpaceMvc\Framework
 */
class Space
{
    /** @var array $app */
    protected array $app = [];

    /**
     * Space constructor.
     * @param bool $execute
     */
    public function __construct($execute = true)
    {
        $this->app['path'] = new Path();
        $this->app['env'] = new Env();
        $this->app['config'] = new Config();
        $this->app['log'] = new Log();
        $this->app['db'] = new Database();
        $this->app['request'] = new Request();
        $this->app['router'] = new Router($this->app['request']);
        $this->app['cache'] = new Cache();
        $this->app['session'] = new Session();
        $this->app['exception'] = new Exception();
        $this->app['asset'] = new Asset();
        $this->app['layout'] = new Layout('frontend', new View('frontend.index'));

        $controllerName = !empty($this->app['router']->getRoute()['controller']) ? $this->app['router']->getRoute()['controller'] : null;
        $actionName = !empty($this->app['router']->getRoute()['action']) ? $this->app['router']->getRoute()['action'] : null;

        if(empty($controllerName) || empty($actionName)) {
            $controllerName = 'App\Http\Controllers\Errors\Error404Controller';
            $actionName = 'index';
        }

        $this->app['controller'] = new Controller($this, $controllerName, $actionName);
        $this->app['mail'] = new Mail();

        if ($execute) {
            echo $this->app['controller']->getResponseBody();
            exit;
        }

    }

    /**
     * getPath
     * @return Path
     */
    public function getPath(): Path
    {
        return $this->app['path'];
    }

    /**
     * getEnv
     * @return Env
     */
    public function getEnv(): Env
    {
        return $this->app['env'];
    }

    /**
     * getConfig
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->app['config'];
    }

    /**
     * getLog
     * @return Log
     */
    public function getLog(): Log
    {
        return $this->app['log'];
    }

    /**
     * getDb
     * @return Database
     */
    public function getDb(): Database
    {
        return $this->app['db'];
    }

    /**
     * getRequest
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->app['request'];
    }

    /**
     * getRouter
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->app['router'];
    }

    /**
     * getCache
     * @return Cache
     */
    public function getCache(): Cache
    {
        return $this->app['cache'];
    }

    /**
     * getSession
     * @return Session
     */
    public function getSession(): Session
    {
        return $this->app['session'];
    }

    /**
     * getException
     * @return Exception
     */
    public function getException(): Exception
    {
        return $this->app['exception'];
    }

    /**
     * getAsset
     * @return Asset
     */
    public function getAsset(): Asset
    {
        return $this->app['asset'];
    }

    /**
     * getLayout
     * @return Layout
     */
    public function getLayout(): Layout
    {
        return $this->app['layout'];
    }

    /**
     * getMail
     * @return Mail
     */
    public function getMail(): Mail
    {
        return $this->app['mail'];
    }

    /**
     * getController
     * @return Controller
     */
    public function getController() : Controller
    {
        return $this->app['controller'];
    }
}
