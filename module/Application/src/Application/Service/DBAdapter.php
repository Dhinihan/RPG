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
        if (isset($entry['id']))
            $data = $this->edit($entry, $data);
        else
            $data = $this->insertNew($entry, $data);
        $this->write($data, $filename);

        return $entry['id'];
    }

    public function delete($id, $filename)
    {
        $data = $this->read($filename);
        $deleted = false;
        foreach ($data['entries'] as $index => $entity)
        {
            if($entity['id'] == $id)
            {
                unset($data['entries'][$index]);
                $this->write($data, $filename);
                $deleted = true;
                break;
            }
        }
        return $deleted;
    }

    protected function write($data, $filename)
    {
        $text = json_encode($data, JSON_PRETTY_PRINT);
        $db = fopen($filename, 'w') or die('aqui');
        fwrite($db, $text);
        fclose($db);
    }
    
    protected function insertNew(array &$entry, array $data)
    {
        $entry['id'] = $data['nextId'];
        $data['entries'][] = $entry;
        $data['nextId'] ++;
        return $data;
    }

    protected function edit(array &$entry, array $data)
    {
        $index = - 1;
        foreach ($data['entries'] as $i => $value)
            if ($value['id'] == $entry['id']) {
                $index = $i;
                break;
            }
        if ($index == - 1)
            throw new \Exception("Não há nenhuma entidade com código " . $entry['id']);
        $data['entries'][$index] = $entry;
        return $data;
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
        switch (json_last_error()) {
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