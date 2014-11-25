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
        $data['nextId']++;
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
        $text = file_get_contents($filename);
        fclose($db);
        $data = json_decode($text, true);
        $this->testJson();
        return $data;
    }
	protected function testJson()
    {
        switch(json_last_error()) {
            case JSON_ERROR_DEPTH:
                echo ' - Maximum stack depth exceeded';
                break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntax error, malformed JSON';
                break;
        }
    }

}