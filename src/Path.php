<?php

namespace SpaceMvc\Framework;

/**
 * Class Path
 * @package SpaceMvc\Framework
 */
class Path
{
    /**
     * get
     * @param false $key
     * @return string|array
     */
    public function get($key = false)
    {
        $paths = require_once pathBase().'/config/paths.php';

        if(empty($key)) {
            return $paths;
        }

        return $paths[$key];
    }
}
