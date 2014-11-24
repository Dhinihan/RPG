<?php
namespace ApiTest\Perfil;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use ZF\Rest\ResourceEvent;
use Api\Perfil\PerfilResource;
use Application\Entity\Perfil;

class PerfilResourceTest extends AbstractHttpControllerTestCase
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
        $this->assertEquals('funcionou', $test[0]->getNome());
        $this->assertEquals('funcionouMesmo', $test[1]->getNome());
    }

    public function testFetch()
    {
        $this->setMockObects();
        $resource = $this->getApplicationServiceLocator()->get('Api\Perfil\PerfilResource');
        $test = $resource->dispatch((new ResourceEvent())->setName('fetch')
            ->setParam('id', 37));
        $this->assertEquals('funciona', $test->getNome());
    }

    protected function setMockObects()
    {
        $dbMock = $this->getMockBuilder('Application\DB\PerfilDB')
            ->disableOriginalConstructor()
            ->getMock();
        $dbMock->method('fetchAll')->will($this->returnValue(array(
            new Perfil(array(
                'nome' => 'funcionou'
            )),
            new Perfil(array(
                'nome' => 'funcionouMesmo'
            ))
        )));
        $dbMock->method('fetch')->will($this->returnValue(new Perfil(array(
            'nome' => 'funciona'
        ))));
        
        $this->getApplicationServiceLocator()
            ->setAllowOverride(true)
            ->setService('PerfilDB', $dbMock);
    }
}