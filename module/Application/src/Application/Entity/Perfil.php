<?php
namespace Application\Entity;

use Zend\Stdlib\ArraySerializableInterface;

class Perfil implements ArraySerializableInterface
{

    protected $id;
    protected $nome;
    protected $email;
    protected $cidade;
    protected $sobrevoce;
    
    
    public function exchangeArray(array $array)
    {}

    public function getArrayCopy()
    {
        return array(
            'teste' => 'funcionou',
            'id' => 1
        );
    }
}