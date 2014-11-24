<?php
namespace ApplicationTest\Service;

use Application\Service\DBAdapter;

class DBAdapterTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testGetExistingDB()
    {
        $db = new DBAdapter();
        $this->assertEquals('funcionou', $db->readDB('data/mockDB.json')[0]['test']);
        $this->assertEquals('funcionou2', $db->readDB('data/mockDB.json')[1]['test']);
    }
    
    public function testGetNonExistingDB()
    {
        $db = new DBAdapter();
        $this->assertFalse($db->readDB('foo'));
    }
    
    /*public function testInsertNew()
    {
        $db = new DBAdapter();
        $newId = $db->insert(array('test' => 'sou um cara novo'), 'data/mockDB.json');
        $data = $db->readDB('data/mockDB.json');
        echo 'dentro     do teste:      ';
        die(var_dump($data));
        $this->assertEquals('sou um cara novo', $data[count($data)-1]['test']);
        $this->assertEquals($newId, $data[count($data)-1]['id']);
    }*/
}