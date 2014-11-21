<?php
namespace Application\Entity;

use Zend\Stdlib\ArraySerializableInterface;

class Perfil implements ArraySerializableInterface
{

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