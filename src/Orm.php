<?php

namespace SpaceMvc\Framework;

/**
 * Class Orm
 * @package SpaceMvc\Framework
 */
class Orm
{
    /** @var array $db */
    protected $db = [
        'default' => [
            'hostname' => null,
            'username' => null,
            'password' => null,
            'database' => null,
        ]
    ];

    /**
     * Orm constructor.
     */
    public function __construct()
    {
        $this->db = [
            'default' => [
                'hostname' => env('DB_HOST', 'localhost'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', 'root'),
                'database' => env('DB_DATABASE', 'space_mvc'),
            ]
        ];

        $connections = array(
            'default' => 'mysql://'.$this->db['default']['username'].':'.$this->db['default']['password'].'@'.$this->db['default']['hostname'].'/'.$this->db['default']['database']
        );

        \ActiveRecord\Config::initialize(function($cfg) use ($connections)
        {
            $cfg->set_model_directory(path('models'));
            $cfg->set_connections($connections);
            $cfg->set_default_connection('default');
        });
    }
}