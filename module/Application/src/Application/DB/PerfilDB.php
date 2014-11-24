<?php
namespace Application\DB;

use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Application\Service\DBAdapter;

class PerfilDB
{
    use ServiceLocatorAwareTrait;

    public function fetchAll()
    {
        $dbReader = $this->getServiceLocator()->get('DBAdapter');
        return $dbReader->readDB('data/perfil.json');
    }
}