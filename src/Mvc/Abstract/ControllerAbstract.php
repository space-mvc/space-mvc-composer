<?php

namespace SpaceMvc\Framework\Mvc\Abstract;

/**
 * Class ControllerAbstract
 * @package SpaceMvc\Framework\Mvc\Abstract
 */
abstract class ControllerAbstract
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
     * init
     * @return $this
     * @throws \Exception
     */
    abstract public function init(): self;

    /**
     * getResponseBody
     * @return string
     */
    abstract public function getResponseBody() : string;
}
