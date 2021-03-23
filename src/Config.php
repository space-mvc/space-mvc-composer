<?php

namespace SpaceMvc\Framework;

use SpaceMvc\Framework\Abstract\ConfigAbstract;

/**
 * Class Config
 * @package SpaceMvc\Framework
 */
class Config extends ConfigAbstract
{
    /**
     * File constructor.
     */
    public function __construct()
    {
        $this->setConfig();
    }

    /**
     * loadConfig
     * @param string $filename
     * @return $this
     * @throws \Exception
     */
    public function setConfig(string $filename = 'app') : self
    {
        $filename = str_replace('.', '/', $filename);
        $file = realpath(pathBase().'/config/'.$filename.'.php');

        if(!file_exists($file)) {
            throw new \Exception('file not found - config/'.$filename.'.php');
        }

        $this->config = require $file;
        return $this;
    }
    /**
     * get
     * @return array
     */
    public function get() : array
    {
        return $this->config;
    }
}
