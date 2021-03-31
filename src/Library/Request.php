<?php

namespace SpaceMvc\Framework\Library;

use App\Model\Profile;
use SpaceMvc\Framework\Library\Abstract\RequestAbstract;

/**
 * Class Request
 * @package SpaceMvc\Framework\Library
 */
class Request extends RequestAbstract
{
    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->uri = !empty($_SERVER['REQUEST_URI']) ? explode('?', $_SERVER['REQUEST_URI'])[0] : '';
        $this->method = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';
        $this->get = !empty($_GET) ? $_GET : [];
        $this->post = !empty($_POST) ? $_POST : [];

        if(!empty($this->post['_method'])) {
            $this->method = $this->post['_method'];
            unset($this->post['_method']);
        }
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
    public function get($key = null, $default = null): mixed
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
    public function post($key = null, $default = null): mixed
    {
        if(!empty($key)) {
            return !empty($this->post[$key]) ? $this->post[$key] : $default;
        }

        return $this->post;
    }

    /**
     * setGet
     * @param string $key
     * @param null $value
     */
    public function setGet(string $key, $value = null)
    {
        $this->get[$key] = $value;
    }
}
