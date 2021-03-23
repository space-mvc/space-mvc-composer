<?php

namespace SpaceMvc\Framework\Library;

use SpaceMvc\Framework\Library\Abstract\PathAbstract;

/**
 * Class Path
 * @package SpaceMvc\Framework\Library
 */
class Path extends PathAbstract
{
    /**
     * get
     * @param false $key
     * @return string|array
     */
    public function get($key = false)
    {
        $paths = require pathBase().'/config/paths.php';

        if(empty($key)) {
            return $paths;
        }

        return $paths[$key];
    }
}
