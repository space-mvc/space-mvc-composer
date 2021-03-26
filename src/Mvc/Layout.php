<?php

namespace SpaceMvc\Framework\Mvc;

use SpaceMvc\Framework\Mvc\Abstract\LayoutAbstract;

/**
 * Class Layout
 * @package SpaceMvc\Framework\Mvc
 */
class Layout extends LayoutAbstract
{
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
     * init
     * @return $this
     */
    public function init(): self
    {
        // These two variables include into the 'require' file automatically
        $data = $this->params;
        $content = $this->view->getResponseBody();

        ob_start();
        $layoutName = str_replace('.', '/', $this->layoutName);
        require $this->path.'/'.$layoutName.'.php';
        $this->responseBody = ob_get_contents();
        ob_end_clean();
        return $this;
    }

    /**
     * getResponseBody
     * @return string
     */
    public function getResponseBody(): string
    {
        return $this->responseBody;
    }
}
