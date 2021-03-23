<?php

namespace SpaceMvc\Framework;

/**
 * Class View
 * @package SpaceMvc\Framework
 */
class View
{
    /** @var string $path */
    private string $path = '';

    /** @var $viewName */
    private string $viewName = '';

    /** @var array $params */
    private array $params = [];

    /** @var string $responseBody */
    private string $responseBody = '';

    /**
     * View constructor.
     *
     * @param $viewName
     * @param array $params
     * @throws \Exception
     */
    public function __construct($viewName, $params = [])
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
