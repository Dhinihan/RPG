<?php
namespace Application\Entity;

use Zend\Stdlib\ArraySerializableInterface;

class Perfil implements ArraySerializableInterface
{

    protected $id;

    protected $nome;

    protected $email;

    protected $cidade;

    protected $sobreVoce;

    public function __construct(array $data = null)
    {
        if (isset($data['id']))
            $this->setId($data['id']);
        if (is_array($data))
            $this->exchangeArray($data);
    }

    public function exchangeArray(array $array)
    {
        foreach ($array as $field => $value) {
            $this->set($field, $value);
        }
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getSobreVoce()
    {
        return $this->sobreVoce;
    }

    protected function set($field, $value)
    {
        if (property_exists($this, $field)) {
            if ($field !== 'id')
                $this->{$field} = $value;
        } else {
            throw new \Exception("O Atributo $field não existe");
        }
    }

    protected function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}