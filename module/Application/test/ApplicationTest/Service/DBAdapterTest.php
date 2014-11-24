<?php
namespace ApplicationTest\Service;

use Application\Service\DBAdapter;

class PerfilTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testGetExistingDB()
    {
        $db = new DBAdapter();
        $this->assertEquals('funcionou', $db->readDB('data/mockDB.json')[0]->test);
        $this->assertEquals('funcionou2', $db->readDB('data/mockDB.json')[1]->test);
    }
    
    public function testGetNonExistingDB()
    {
        $db = new DBAdapter();
        $this->assertFalse($db->readDB('foo'));
    }
}