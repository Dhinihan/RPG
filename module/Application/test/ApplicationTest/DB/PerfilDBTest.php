<?php
namespace ApplicationTest\Service;

use Zend\Test\PHPUnit\Controller\AbstractControllerTestCase;
use Application\DB\PerfilDB;
use Application\Factory\PerfilDBFactory;

class PerfilDBTest extends AbstractControllerTestCase
{

    public function setUp()
    {
        $this->setApplicationConfig(include '/home/vinicius/workspace/RPG/config/application.config.php');
        parent::setUp();
    }

    public function testGetExistingDB()
    {
        $this->setMockObjects();
        $perfilDb = $this->getApplicationServiceLocator()->get('PerfilDB');
        $this->assertEquals('funcionou', $perfilDb->fetchAll()[0]->getNome());
    }
    
	public function setMockObjects()
    {
        $dbAdapter = $this->getMockBuilder('Application\Service\DBAdapter')
            ->disableOriginalConstructor()
            ->getMock();
        $dbAdapter->method('readDB')->will($this->returnValue(array(
            array(
                'nome' => 'funcionou'
            )
        )));
        $this->getApplicationServiceLocator()
            ->setAllowOverride(true)
            ->setService('DBAdapter', $dbAdapter);
    }
}