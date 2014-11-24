<?php
namespace Application\Factory;

use Application\DB\PerfilDB;
class PerfilDBFactory
{
    public function __invoke($services)
    {
        $db = new PerfilDB();
        $db->setServiceLocator($services);
        return $db;
    }
}