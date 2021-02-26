<?php

namespace SpaceMvc\Framework;

/**
 * Class Space
 * @package SpaceMvc\Framework
 */
class Space
{
    /** @var array $di */
    protected $di = [];

    /**
     * di constructor.
     */
    public function __construct()
    {
        $this->di['path'] = new Path();
        $this->di['env'] = new Env();
        $this->di['config'] = new Config();
        $this->di['log'] = new Log();
        $this->di['db'] = new Database();
        $this->di['request'] = new Request();
        $this->di['router'] = new Router($this->di['request']);
        $this->di['cache'] = new Cache();
//        $this->di['session'] = new Session();
//        $this->di['exception'] = new Exception();
//        $this->di['layout'] = new Layout();
//        $this->di['mail'] = new Mail();
//        $this->di['asset'] = new Asset();
//        $this->di['controller'] = (new Controller($this, $this->di['router']->getRoute()['controller'], $this->di['router']->getRoute()['action']));
//        $this->di['response'] = new Response($this->di['controller']->getLayout()->getResponseBody());
    }

    /**
     * getPath
     * @return Path
     */
    public function getPath() : Path
    {
        return $this->di['path'];
    }

    /**
     * getEnv
     * @return Env
     */
    public function getEnv() : Env
    {
        return $this->di['env'];
    }

    /**
     * getConfig
     * @return Config
     */
    public function getConfig() : Config
    {
        return $this->di['config'];
    }

    /**
     * getLog
     * @return Log
     */
    public function getLog() : Log
    {
        return $this->di['log'];
    }

    /**
     * getDb
     * @return Database
     */
    public function getDb() : Database
    {
        return $this->di['db'];
    }

    /**
     * getRequest
     * @return Request
     */
    public function getRequest() : Request
    {
        return $this->di['request'];
    }

    /**
     * getRouter
     * @return Router
     */
    public function getRouter() : Router
    {
        return $this->di['router'];
    }

    /**
     * getCache
     * @return Cache
     */
    public function getCache() : Cache
    {
        return $this->di['cache'];
    }
    

//

//
//    /**
//     * init.
//     */
//    public function init()
//    {
//        if($this->debug === false) {
//            echo $this->di['response']->getResponseBody();
//            exit;
//        } else {
//            $this->dump($this, true);
//        }
//    }
//

//
//    /**
//     * asset.
//     *
//     * @return mixed
//     */
//    public function asset()
//    {
//        return $this->di['asset'];
//    }
//
//    /**
//     * env.
//     *
//     * @return mixed
//     */
//    public function env()
//    {
//        return $this->di['env'];
//    }
//
//    /**
//     * request.
//     *
//     * @return mixed
//     */
//    public function request()
//    {
//        return $this->di['request'];
//    }
//
//    /**
//     * exception.
//     *
//     * @param $message
//     * @param $code
//     * @return Exception
//     */
//    public function exception($message, $code)
//    {
//        return $this->di['exception']->throw($message, $code);
//    }
//
//    /**
//     * log.
//     *
//     * @param $data
//     * @param string $file
//     * @return mixed
//     */
//    public function log($data, $file = 'default')
//    {
//        return $this->di['log']->write($data, $file);
//    }
//
//    /**
//     * mail.
//     *
//     * @return mixed
//     */
//    public function mail()
//    {
//        return $this->di['mail'];
//    }
//
//
//    /**
//     * view
//     *
//     * @param $viewName
//     * @param array $params
//     * @return View
//     */
//    public function view($viewName, $params = [])
//    {
//        return $this->di['view'] = new View($viewName, $params);
//    }
//
//    /**
//     * layout.
//     *
//     * @return mixed
//     */
//    public function layout()
//    {
//        return $this->di['layout'];
//    }
}
