<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class RequestAbstract
 * @package SpaceMvc\Framework\Library\Abstract
 */
abstract class RequestAbstract
{
    /** @var string $uri */
    protected string $uri = '/';

    /** @var string $method */
    protected string $method = 'get';

    /** @var array $get */
    protected array $get = [];

    /** @var array $post */
    protected array $post = [];

    /**
     * getUri
     * @return string
     */
    abstract public function getUri(): string;

    /**
     * getMethod
     * @return string
     */
    abstract public function getMethod(): string;

    /**
     * get
     * @param null $key
     * @param null $default
     * @return mixed
     */
    abstract public function get($key = null, $default = null): mixed;

    /**
     * post
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    abstract public function post($key = null, $default = null): mixed;
}
