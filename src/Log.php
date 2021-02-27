<?php

namespace SpaceMvc\Framework;

/**
 * Class Log
 * @package SpaceMvc\Framework
 */
class Log
{
    /**
     * write.
     *
     * @param $data
     * @param string $filename
     */
    public function write($data, $filename = 'app.log') : void
    {
        $filename = path('log').'/'.$filename;
        $fh = fopen($filename, 'a') or die("can't open file");
        $data = is_array($data) || is_object($data) ? json_encode($data) : $data;
        fwrite($fh, date('Y-m-d H:i:s').' : '.$data."\n");
        fclose($fh);
    }
}