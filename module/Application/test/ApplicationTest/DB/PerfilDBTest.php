<?php
namespace ApplicationTest\Service;

use Zend\Test\PHPUnit\Controller\AbstractControllerTestCase;
use Application\DB\PerfilDB;
use Application\Factory\PerfilDBFactory;
use Assetic\Exception\Exception;

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
        $this->assertEquals('funcionou', $perfilDb->fetchAll()[0]
            ->getNome());
        $this->assertEquals('funciona', $perfilDb->fetchAll()[1]
            ->getNome());
    }

    public function testFetchEntity()
    {
        $this->setMockObjects();
        $perfilDb = $this->getApplicationServiceLocator()->get('PerfilDB');
        $this->assertEquals('funcionouMesmo', $perfilDb->fetch(37)
            ->getNome());
    }

    public function testFetchNonExistingEntity()
    {
        $this->setMockObjects();
        $perfilDb = $this->getApplicationServiceLocator()->get('PerfilDB');
        try {
            $perfilDb->fetch(38);
        } catch (\Exception $e) {
            $this->assertEquals(400, $e->getCode());
        }
    }
    
    public function testPatchEntity()
    {
        $this->setMockObjects();
        $perfilDb = $this->getApplicationServiceLocator()->get('PerfilDB');
        $testPerfil = $perfilDb->patch(37, array('sobreVoce' => 'Continuo Sendo um teste.'));
        $this->assertEquals('Continuo Sendo um teste.', $testPerfil->getSobreVoce());
        $this->assertEquals('funcionouMesmo', $testPerfil->getNome());
    }
    
    public function testCreateEntity()
    {
        $this->setMockObjects();
        $perfilDb = $this->getApplicationServiceLocator()->get('PerfilDB');
        $testPerfil = $perfilDb->create(array('sobreVoce' => 'Sou um novo teste.'));
        $this->assertEquals('Sou um novo teste.', $testPerfil->getSobreVoce());
    }

    public function setMockObjects()
    {
        $dbAdapter = $this->getMockBuilder('Application\Service\DBAdapter')
            ->disableOriginalConstructor()
            ->getMock();
        
        $dbAdapter->method('readDB')->will($this->returnValue(array(
            array(
                'id' => 1,
                'nome' => 'funcionou'
            ),
            array(
                'id' => 2,
                'nome' => 'funciona'
            ),
            array(
                'id' => 37,
                'nome' => 'funcionouMesmo',
                'sobreVoce' => 'Apenas um teste'
            )
        )));
        
        $this->getApplicationServiceLocator()
            ->setAllowOverride(true)
            ->setService('DBAdapter', $dbAdapter);
    }
}