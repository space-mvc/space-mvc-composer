<?php

namespace SpaceMvc\Framework;

/**
 * Class Controller
 * @package SpaceMvc\Framework
 */
class Controller
{
    /** @var Space $app */
    private $app;

    /** @var string $controllerName */
    private $controllerName = 'App\Http\Frontend\ErrorController';

    /** @var string $actionName */
    private $actionName = 'error404';

    /** @var array $params */
    private $params = [];

    /** @var Layout $layout */
    private $layout;

    /**
     * Controller constructor.
     *
     * @param Space $app
     * @param string $controllerName
     * @param string $actionName
     * @param array $params
     */
    public function __construct(Space $app, $controllerName, $actionName, $params = [])
    {
        $this->app = $app;
        $this->controllerName = '\\'.$controllerName;
        $this->actionName = $actionName;
        $this->params = $params;

        $this->init();
    }

    /**
     * execute.
     *
     * @return $this
     */
    public function init()
    {
        $x = new $this->controllerName;
        dump($x, 1);
        if(!class_exists($this->controllerName)) {
            exception('controller class does not exist:'.$this->controllerName, 500);
        }

//        $controller = new $controllerName($this->app);
//
//        $this->layout = $controller->getDi()->get('layout');
//
//        if(!method_exists($controller, $this->actionName)) {
//            exception('action '.$this->actionName.'() not found in controller : '.$controllerName,500);
//        }
//
//        $view = call_user_func_array(array($controller, $this->actionName), $this->params);
//
//        if($view instanceof View) {
//            $this->layout->setView($view);
//            $this->layout->init();
//        } else {
//            echo $view;
//            exit;
//        }
    }
}
