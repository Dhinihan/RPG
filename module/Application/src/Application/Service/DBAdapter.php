<?php
namespace Application\Service;

class DBAdapter
{

    /**
     *
     * @param string $filename            
     * @return boolean|unknown
     */
    public function readDB($filename)
    {
        if (! file_exists($filename))
            return false;
        $data = $this->read($filename);
        return $data['entries'];
    }

    public function insert(array $entry, $filename)
    {
        $data = $this->read($filename);
        $entry['id'] = $data['nextId'];
        $data['entries'][] = $entry;
        $text = json_encode($data);
        $db = fopen($filename, 'w');
        fwrite($db, $text);
        fclose($db);
        return $entry['id'];
    }

    /**
     *
     * @param string $filename            
     * @return array
     */
    protected function read($filename)
    {
        $db = fopen($filename, 'r');
        $text = fread($db, filesize($filename));
        fclose($db);
        $data = unserialize(base64_decode($text));
        return $data;
    }
}