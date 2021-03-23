<?php

namespace SpaceMvc\Framework;

/**
 * Class Controller
 * @package SpaceMvc\Framework
 */
class Controller
{
    /** @var Space $app */
    private Space $app;

    /** @var string $controllerName */
    private string $controllerName = 'App\Http\Errors\Error404Controller';

    /** @var string $actionName */
    private string $actionName = 'index';

    /** @var array $params */
    private array $params = [];

    /** @var string $responseBody */
    private string $responseBody = '';

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
        if(!class_exists($this->controllerName)) {
            exception('controller class does not exist:'.$this->controllerName, 500);
        }

        $controller = new $this->controllerName($this->app);

        if(!method_exists($controller, $this->actionName)) {
            exception('action '.$this->actionName.'() not found in controller : '.$controllerName,500);
        }

        $actionResponse = call_user_func_array(array($controller, $this->actionName), $this->params);

        if($actionResponse instanceof View) {
            $layoutName = $controller->getLayout();
            $layout = new Layout($layoutName, $actionResponse, $this->params);
            $layout->init();
            $this->responseBody = $layout->getResponseBody();
        } else {
            echo $actionResponse;
            exit;
        }
    }

    /**
     * getResponseBody
     * @return string
     */
    public function getResponseBody() : string
    {
        return $this->responseBody;
    }
}
