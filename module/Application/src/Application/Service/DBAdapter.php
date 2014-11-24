<?php
namespace Application\Service;

class DBAdapter
{
    /**
     * @param string $filename
     * @return boolean|unknown
     */
    public function readDB($filename)
    {
        if(!file_exists($filename))
            return false;
        $db = fopen($filename, 'r');
        $text = fread($db, filesize($filename));
        $data = json_decode($text, true);
        fclose($db);
        return $data;
    }
}