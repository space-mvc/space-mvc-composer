<?php

namespace SpaceMvc\Framework\Library;

use SpaceMvc\Framework\Library\Abstract\LogAbstract;

/**
 * Class Log
 * @package SpaceMvc\Framework\Library
 */
class Log extends LogAbstract
{
    /**
     * write
     * @param mixed $data
     * @param string $filename
     * @return $this
     */
    public function write(mixed $data, string $filename = 'app.log') : self
    {
        $filename = path('logs').'/'.$filename;
        $fh = fopen($filename, 'a') or die("can't open file");
        $data = is_array($data) || is_object($data) ? json_encode($data) : $data;
        fwrite($fh, date('Y-m-d H:i:s').' : '.$data."\n");
        fclose($fh);
        return $this;
    }
}