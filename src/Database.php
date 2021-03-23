<?php

namespace SpaceMvc\Framework;

use SpaceMvc\Framework\Database\Mysql;

/**
 * Class Database
 * @package SpaceMvc\Framework
 */
class Database
{
    /** @var array $databases */
    protected array $databases = [];

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->databases['mysql'] = new Mysql();
    }

    /**
     * getMysql
     * @return mixed
     */
    public function getMysql()
    {
        return $this->databases['mysql'];
    }
}
