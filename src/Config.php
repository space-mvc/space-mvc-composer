<?php

namespace SpaceMvc\Framework;

/**
 * Class Config
 * @package SpaceMvc\Framework
 */
class Config
{
    /** @var array $config */
    private array $config = [];

    /**
     * set
     * @param string $key
     * @param $value
     */
    public function set(string $key, $value) : void
    {
        $this->config[$key] = $value;
    }

    /**
     * get
     * @param string | bool $key
     * @param null $default
     */
    public function get($key = false, $default = null)
    {
        if(empty($key)) {
            return $this->config;
        }
        
        return !empty($this->config[$key]) ? $this->config[$key] : $default;
    }

    /**
     * getFile
     * @param string $filename
     * @return array
     */
    public function getFile(string $filename = '')
    {
        $filename = str_replace('.', '/', $filename);
        $file = realpath(pathBase().'/config/'.$filename.'.php');

        if(!file_exists($file)) {
            throw new \Exception('file not found - config/'.$filename.'.php');
        }

        return require $file;
    }
}
