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

    public function testFetchAll()
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

    public function testPatch()
    {
        $this->setMockObects();
        $resource = $this->getApplicationServiceLocator()->get('Api\Perfil\PerfilResource');
        $test = $resource->dispatch((new ResourceEvent())->setName('patch')
            ->setParam('id', 37)
            ->setParam('data', array(
            'sobreVoce' => 'Continuo sendo um teste.'
        )));
        $this->assertEquals('funciona', $test->getNome());
        $this->assertEquals('Continuo sendo um teste.', $test->getSobreVoce());
    }

    public function testCreate()
    {
        $this->setMockObects();
        $resource = $this->getApplicationServiceLocator()->get('Api\Perfil\PerfilResource');
        $test = $resource->dispatch((new ResourceEvent())->setName('create')
            ->setParam('data', array(
            'sobreVoce' => 'Sou um novo perfil!'
        )));
        $this->assertEquals('Sou um novo perfil!', $test->getSobreVoce());
    }
    
    public function testDelete()
    {
        $this->setMockObects();
        $resource = $this->getApplicationServiceLocator()->get('Api\Perfil\PerfilResource');
        $test = $resource->dispatch((new ResourceEvent())->setName('delete')
            ->setParam('id', 2));
        $this->assertTrue($test);
    }

    protected function setMockObects()
    {
        $dbMock = $this->getMockBuilder('Application\DB\PerfilDB')
            ->disableOriginalConstructor()
            ->getMock();
        
        $dbMock = $this->defineFetchAll($dbMock);
        $dbMock = $this->defineFetch($dbMock);
        $dbMock = $this->definePatch($dbMock);
        $dbMock = $this->defineCreate($dbMock);
        $dbMock = $this->defineDelete($dbMock);

        $this->getApplicationServiceLocator()
            ->setAllowOverride(true)
            ->setService('PerfilDB', $dbMock);
    }
    
    protected function defineDelete($dbMock)
    {
        $dbMock->method('delete')->will($this->returnValue(true));
        return $dbMock;
    }
    
	protected function defineCreate($dbMock)
    {
        $dbMock->method('create')->will($this->returnValue(new Perfil(array(
            'sobreVoce' => 'Sou um novo perfil!'
        ))));
        return $dbMock;
    }

	protected function definePatch($dbMock)
    {
        $dbMock->method('patch')->will($this->returnValue(new Perfil(array(
            'nome' => 'funciona',
            'sobreVoce' => 'Continuo sendo um teste.'
        ))));
        return $dbMock;
    }

    protected function defineFetch($dbMock)
    {
        $dbMock->method('fetch')->will($this->returnValue(new Perfil(array(
            'nome' => 'funciona',
            'sobreVoce' => 'Apenas um teste'
        ))));
        return $dbMock;
    }

    protected function defineFetchAll($dbMock)
    {
        $dbMock->method('fetchAll')->will($this->returnValue(array(
            new Perfil(array(
                'nome' => 'funcionou'
            )),
            new Perfil(array(
                'nome' => 'funcionouMesmo'
            ))
        )));
        return $dbMock;
    }
}