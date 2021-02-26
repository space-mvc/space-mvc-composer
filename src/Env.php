<?php

namespace SpaceMvc\Framework;

/**
 * Class Env
 * @package SpaceMvc\Framework
 */
class Env
{
    /** @var array $data */
    private $data = [];

    /**
     * Environment constructor.
     */
    public function __construct()
    {
        $this->initData();
    }

    /**
     * initData.
     */
    public function initData()
    {
        $filename = pathBase().'/.env';

        if(file_exists($filename)) {

            $handle = fopen($filename, "r");

            if ($handle) {
                while (($line = fgets($handle)) !== false) {

                    $segments = explode('=', $line);

                    $key = !empty($segments[0]) ? trim(strtoupper($segments[0])) : null;
                    $value = !empty($segments[1]) ? trim($segments[1]) : null;

                    if(!empty($key) && !empty($value)) {

                        switch(strtolower($value))
                        {
                            case 'true';
                                $value = true;
                                break;

                            case 'false';
                                $value = false;
                                break;
                        }

                        $this->data[$key] = $value;
                    }
                }

                fclose($handle);
            }
        }
    }

    /**
     * get.
     *
     * @param null $key
     * @param null $default
     * @return mixed
     */
    public function get($key = null, $default = null)
    {
        $key = strtoupper($key);

        if(!$key) {
            return $this->data;
        } else {
            return !empty($this->data[$key]) ? $this->data[$key] : $default;
        }
    }
}