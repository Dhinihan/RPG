<?php
namespace Application\DB;

use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Application\Service\DBAdapter;
use Application\Entity\Perfil;

class PerfilDB
{
    use ServiceLocatorAwareTrait;

    public function fetchAll()
    {
        $dbReader = $this->getServiceLocator()->get('DBAdapter');
        $data = $dbReader->readDB('data/perfil.json');
        $entities = array();
        foreach ($data as $entity)
            $entities[] = new Perfil($entity);
        return $entities;
    }

    /**
     *
     * @param integer $id            
     * @throws \Exception
     * @return \Application\Entity\Perfil
     */
    public function fetch($id)
    {
        $dbReader = $this->getServiceLocator()->get('DBAdapter');
        $data = $dbReader->readDB('data/perfil.json');
        foreach ($data as $entity)
            if ($entity['id'] == $id)
                return new Perfil($entity);
        throw new \Exception("Não existe entidade com o id = $id", 400);
    }

    /**
     *
     * @param integer $id            
     * @param array $data            
     * @return \Application\Entity\Perfil
     */
    public function patch($id, array $data)
    {
        $perfil = $this->fetch($id);
        $perfil->exchangeArray($data);
        $this->getServiceLocator()
            ->get('DBAdapter')
            ->insert($perfil->getArrayCopy(), 'data/perfil.json');
        return $perfil;
    }
    
    /**
     *
     * @param array $data
     * @return \Application\Entity\Perfil
     */
    public function create(array $data)
    {
        $perfil = new Perfil();
        $perfil->exchangeArray($data);
        $id = $this->getServiceLocator()
        ->get('DBAdapter')
        ->insert($perfil->getArrayCopy(), 'data/perfil.json');
        $perfil->setId($id);
        return $perfil;
    }
}