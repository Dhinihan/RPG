<?php
namespace ApiTest\Perfil;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use ZF\Rest\ResourceEvent;
use Api\Perfil\PerfilResource;

class PerfilTest extends AbstractHttpControllerTestCase
{

    public function setUp()
    {
        $this->setApplicationConfig(include '/home/vinicius/workspace/RPG/config/application.config.php');
        
        parent::setUp();
    }

    public function testfetchAll()
    {
        $this->setMockObects();
        $resource = $this->getApplicationServiceLocator()->get('Api\Perfil\PerfilResource');
        $test = $resource->dispatch((new ResourceEvent())->setName('fetchAll'));
        $this->assertEquals('funcionou', $test[0]->nome);
    }

    protected function setMockObects()
    {
        $dbMock = $this->getMockBuilder('Application\DB\PerfilDB')
            ->disableOriginalConstructor()
            ->getMock();
        $dbMock->method('fetchAll')->will($this->returnValue(array(
            (object) array(
                'nome' => 'funcionou'
            )
        )));
        $this->getApplicationServiceLocator()
            ->setAllowOverride(true)
            ->setService('PerfilDB', $dbMock);
    }
}