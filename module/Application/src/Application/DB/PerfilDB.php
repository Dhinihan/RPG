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
    
    public function fetch()
    {
        
    }
}