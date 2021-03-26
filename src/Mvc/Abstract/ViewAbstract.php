<?php

namespace SpaceMvc\Framework\Mvc\Abstract;

/**
 * Class ViewAbstract
 * @package SpaceMvc\Framework\Mvc\Abstract
 */
abstract class ViewAbstract
{
    /** @var string $path */
    protected string $path = '';

    /** @var $viewName */
    protected string $viewName = '';

    /** @var array $params */
    protected array $params = [];

    /** @var string $responseBody */
    protected string $responseBody = '';

    /**
     * getResponseBody
     * @return string
     */
    abstract public function getResponseBody(): string;
}
