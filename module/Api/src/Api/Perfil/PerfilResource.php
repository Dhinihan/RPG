<?php
namespace Api\Perfil;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use ZF\ContentNegotiation\JsonModel;
use Application\Entity\Perfil;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class PerfilResource extends AbstractResourceListener
{
    use ServiceLocatorAwareTrait;
    
    /**
     * Create a resource
     *
     * @param mixed $data            
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
    }

    /**
     * Delete a resource
     *
     * @param mixed $id            
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param mixed $data            
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param mixed $id            
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $db = $this->getServiceLocator()->get('PerfilDB');
    try {
            return $db->fetch($id);
        } catch (Exception $e) {
            return new ApiProblem($e->getCode(), $e->getMessage());
        }
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param array $params            
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $db = $this->getServiceLocator()->get('PerfilDB');
        try {
            return $db->fetchAll();
        } catch (Exception $e) {
            return new ApiProblem($e->getCode(), $e->getMessage());
        }
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param mixed $id            
     * @param mixed $data            
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        $db = $this->getServiceLocator()->get('PerfilDB');
        try {
            return $db->patch($id, (array) $data);
        } catch (Exception $e) {
            return new ApiProblem($e->getCode(), $e->getMessage());
        }
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param mixed $data            
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param mixed $id            
     * @param mixed $data            
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}