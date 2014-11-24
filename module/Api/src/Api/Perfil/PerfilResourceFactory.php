<?php
namespace Api\Perfil;

class PerfilResourceFactory
{
    public function __invoke($services)
    {
        $resource = new PerfilResource();
        $resource->setServiceLocator($services);
        return $resource;
    }
}
