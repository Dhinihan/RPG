<?php
return array(
    'router' => array(
        'routes' => array(
            'example.rest.example' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/example[/:example_id]',
                    'defaults' => array(
                        'controller' => 'example\\V1\\Rest\\Example\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'example.rest.example',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'example\\V1\\Rest\\Example\\ExampleResource' => 'example\\V1\\Rest\\Example\\ExampleResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'example\\V1\\Rest\\Example\\Controller' => array(
            'listener' => 'example\\V1\\Rest\\Example\\ExampleResource',
            'route_name' => 'example.rest.example',
            'route_identifier_name' => 'example_id',
            'collection_name' => 'example',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'example\\V1\\Rest\\Example\\ExampleEntity',
            'collection_class' => 'example\\V1\\Rest\\Example\\ExampleCollection',
            'service_name' => 'example',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'example\\V1\\Rest\\Example\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'example\\V1\\Rest\\Example\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'example\\V1\\Rest\\Example\\Controller' => array(
                0 => 'application/vnd.example.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'example\\V1\\Rest\\Example\\ExampleEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'example.rest.example',
                'route_identifier_name' => 'example_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'example\\V1\\Rest\\Example\\ExampleCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'example.rest.example',
                'route_identifier_name' => 'example_id',
                'is_collection' => true,
            ),
        ),
    ),
);
