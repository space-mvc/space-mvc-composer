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
    protected View $view;

    /** @var string $responseBody */
    protected string $responseBody = '';

    /**
     * LayoutAbstract constructor.
     * @param string $layoutName
     * @param View $view
     * @param array $params
     */
    abstract public function __construct(string $layoutName, View $view, array $params = []);

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
