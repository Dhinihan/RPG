<?php
namespace ApplicationTest\Entity;

use Zend\Stdlib\ArraySerializableInterface;
use Application\Entity\Perfil;

class PerfilTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        return parent::setUp();
    }

    public function testHydration()
    {
        $perfil = new Perfil();

        $perfil->exchangeArray(array(
            'nome' => 'Teste da Silva',
            'email' => 'teste@teste.com',
            'cidade' => 'Cidade Teste',
            'sobreVoce' => 'Sou apenas um teste.'
        ));
        $this->assertEquals('Teste da Silva', $perfil->getNome());
        $this->assertEquals('teste@teste.com', $perfil->getEmail());
        $this->assertEquals('Cidade Teste', $perfil->getCidade());
        $this->assertEquals('Sou apenas um teste.', $perfil->getSobreVoce());
    }
    
    public function testGetArray()
    {
        $perfil = new Perfil(array('id'=>4, 'nome'=>'Teste'));
        $this->assertEquals('Teste', $perfil->getArrayCopy()['nome']);
    }
    
}