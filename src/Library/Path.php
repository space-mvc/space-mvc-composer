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
     * @param string null $key
     * @return mixed
     */
    public function get($key = null): mixed
    {
        $paths = require pathBase().'/config/paths.php';

        if(empty($key)) {
            return $paths;
        }

        return $paths[$key];
    }
}
