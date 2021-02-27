<?php

namespace SpaceMvc\Framework;

/**
 * Class Request
 * @package SpaceMvc\Framework
 */
class Request
{
    /** @var string $uri */
    private string $uri = '/';

    /** @var string $method */
    private string $method = 'get';

    /** @var array $get */
    private array $get = [];

    /** @var array $post */
    private array $post = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->uri = !empty($_SERVER['REQUEST_URI']) ? explode('?', $_SERVER['REQUEST_URI'])[0] : null;
        $this->method = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
        $this->get = !empty($_GET) ? $_GET : [];
        $this->post = !empty($_POST) ? $_POST : [];
    }

    /**
     * getUri
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * getMethod
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * get
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key = null, $default = null)
    {
        if(!empty($key)) {
            return !empty($this->get[$key]) ? $this->get[$key] : $default;
        }

        return $this->get;
    }

    /**
     * post
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function post($key = null, $default = null)
    {
        if(!empty($key)) {
            return !empty($this->post[$key]) ? $this->post[$key] : $default;
        }

        return $this->post;
    }
}
