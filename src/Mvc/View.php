<?php

namespace SpaceMvc\Framework\Mvc;

use SpaceMvc\Framework\Mvc\Abstract\ViewAbstract;

/**
 * Class View
 * @package SpaceMvc\Framework\Mvc
 */
class View extends ViewAbstract
{
    /**
     * View constructor.
     * @param string $viewName
     * @param array $params
     * @throws \Exception
     */
    public function __construct(string $viewName, $params = [])
    {
        $this->path = path('views');
        $this->viewName = $viewName;
        $this->params = $params;

        // This variable it automatically included in 'require'
        $data = $params;

        ob_start();

        $viewFilename = $this->path.'/'.str_replace('.', '/', $this->viewName).'.php';

        if(!file_exists($viewFilename)) {
            exception('view not found : '.$this->viewName, 500);
        }

        require $viewFilename;

        $this->responseBody = ob_get_contents();

        ob_end_clean();
    }

    /**
     * getResponseBody
     *
     * @return string
     */
    public function getResponseBody(): string
    {
        return $this->responseBody;
    }
}
