<?php
return array(
    'router' => array(
        'routes' => array(
            'api' => array(
                'child_routes' => array(
                    'perfil' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/perfil[/:id]',
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'controller' => 'Api\Perfil\Controller'
                            )
                        )
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Api\Perfil\PerfilResource' => 'Api\Perfil\PerfilResourceFactory'
        )
    ),
    'zf-rest' => array(
        'Api\Perfil\Controller' => array(
            'listener' => 'Api\Perfil\PerfilResource',
            'route_name' => 'api/perfil',
            'route_identifier_name' => 'id',
            'collection_name' => 'perfil',
            'entity_http_methods' => array(
                'GET'
            ),
            'collection_http_methods' => array(
                'GET'
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => 'count',
            'entity_class' => 'Application\Entity\Perfil',
            'collection_class' => 'Api\Perfil\PerfilCollection'
        )
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Api\Homologacao\Controller' => 'HalJson'
        ),
        'content_type_whitelist' => array(
            'Api\Homologacao\Controller' => array(
                'application/json'
            )
        )
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Application\Entity\Perfil' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'api/perfil',
                'route_identifier_name' => 'id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable'
            ),
            'example\\V1\\Rest\\Example\\ExampleCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'pefil',
                'route_identifier_name' => 'id',
                'is_collection' => true
            )
        )
    )
);