<?php

namespace SpaceMvc\Framework\Mvc\Abstract;

/**
 * Class LayoutAbstract
 * @package SpaceMvc\Framework\Mvc\Abstract
 */
abstract class LayoutAbstract
{
    /** @var string $path */
    protected string $path = '';

    /** @var string $layoutName */
    protected string $layoutName;

    /** @var array $params */
    protected array $params = [];

    /** @var View $view */
    protected $view;

    /** @var string $responseBody */
    protected string $responseBody = '';

    /**
     * init
     * @return $this
     */
    abstract public function init(): self;

    /**
     * getResponseBody
     * @return string
     */
    abstract public function getResponseBody(): string;
}
