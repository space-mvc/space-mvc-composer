<?php

namespace SpaceMvc\Framework;

use SpaceMvc\Framework\Abstract\EnvAbstract;

/**
 * Class Env
 * @package SpaceMvc\Framework
 */
class Env extends EnvAbstract
{
    /**
     * Env constructor.
     */
    public function __construct()
    {
        $this->setEnv();
    }

    /**
     * setEnv
     * @return $this
     */
    public function setEnv() : self
    {
        $filename = pathBase().'/.env';

        if(file_exists($filename)) {

            $handle = fopen($filename, "r");

            if ($handle) {
                while (($line = fgets($handle)) !== false) {

                    $segments = explode('=', $line);

                    $key = !empty($segments[0]) ? trim(strtoupper($segments[0])) : null;
                    $value = !empty($segments[1]) ? trim($segments[1]) : null;

                    $value = str_replace('"', null, $value);
                    $value = str_replace("'", null, $value);

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

                        $this->env[$key] = $value;
                    }
                }

                fclose($handle);
            }
        }

        return $this;
    }

    /**
     * get
     * @param string|null $key
     * @param mixed|null $default
     * @return mixed
     */
    public function get(string $key = null, mixed $default = null) : mixed
    {
        $key = strtoupper($key);

        if(!$key) {
            return $this->env;
        } else {
            return !empty($this->env[$key]) ? $this->env[$key] : $default;
        }
    }
}
