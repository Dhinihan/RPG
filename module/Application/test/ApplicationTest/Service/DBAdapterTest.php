<?php
namespace ApplicationTest\Service;

use Application\Service\DBAdapter;

class DBAdapterTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }
    
    public function tearDown()
    {
        $db = fopen('data/mockDB.json', 'w');
        fwrite($db, '{"nextId":3,"entries":[{"test":"funcionou","id":1},{"test":"funcionou2","id":2}]}');
        fclose($db);
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
    
    public function testInsertNew()
    {
        $db = new DBAdapter();
        $data = $db->readDB('data/mockDB.json');
        $newId = $db->insert(array('test' => 'sou um cara novo'), 'data/mockDB.json');
        $data = $db->readDB('data/mockDB.json');
        $this->assertEquals('sou um cara novo', $data[count($data)-1]['test']);
        $this->assertEquals($newId, $data[count($data)-1]['id']);
    }
}