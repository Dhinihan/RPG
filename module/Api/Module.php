<?php
namespace Api;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface, Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ApigilityProviderInterface, AutoloaderProviderInterface, ConfigProviderInterface
{

    public function getConfig()
    {
        $config = array();
        $configFiles = array(
            __DIR__ . '/config/module.config.php',
        );
        
        // Merge all module config options
        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
        }
        
        return $config;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }
}