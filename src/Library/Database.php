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
    /** @var array $config */
    protected array $config;

    /**
     * Database constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config->setConfig('app')->get()['databases']['mysql'];
        $this->connect();
    }

    /**
     * connect
     */
    public function connect(): void
    {
        \ActiveRecord\Config::initialize(function($cfg)
        {
            $cfg->set_model_directory(pathBase().'/app/Model');
            $cfg->set_connections(array(
                'development' => 'mysql://'.$this->config['username'].':'.$this->config['password'].'@'.$this->config['hostname'].'/'.$this->config['database']
            ));
        });
    }
}
