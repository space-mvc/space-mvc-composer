<?php

namespace SpaceMvc\Framework;

/**
 * Class Layout
 * @package SpaceMvc\Framework
 */
class Layout
{
    /** @var string $path */
    private string $path = '';

    /** @var string $layoutName */
    private string $layoutName;

    /** @var array $params */
    private array $params = [];

    /** @var View $view */
    private View $view;

    /** @var string $responseBody */
    private string $responseBody = '';

    /**
     * Layout constructor.
     * @param string $layoutName
     * @param View $view
     * @param array $params
     */
    public function __construct(string $layoutName, View $view, array $params = [])
    {
        $this->path = path('layouts');
        $this->layoutName = $layoutName;
        $this->view = $view;
        $this->params = $params;
    }

    /**
     * init.
     */
    public function init() : void
    {
        // These two variables include into the 'require' file automatically
        $data = $this->params;
        $content = $this->view->getResponseBody();

        ob_start();
        $layoutName = str_replace('.', '/', $this->layoutName);
        require $this->path.'/'.$layoutName.'.php';
        $this->responseBody = ob_get_contents();
        ob_end_clean();
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
