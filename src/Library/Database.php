<?php

namespace SpaceMvc\Framework\Library;

use SpaceMvc\Framework\Library\Abstract\DatabaseAbstract;
use SpaceMvc\Framework\Library\Database\Mysql;

/**
 * Class Database
 * @package SpaceMvc\Framework\Library
 */
class Database extends DatabaseAbstract
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
