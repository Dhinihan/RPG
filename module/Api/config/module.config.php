<?php
return array(
    'router' => array(
        'routes' => array(
            'api' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/api'
                ),
                'may_terminate' => false
            )
        )
    ),
    'zf-hal' => array(
        'renderer' => array(
            'render_embedded_entities' => false,
            'render_collections' => true
        )
    ),
    'zf-mvc-auth' => array(
		/*'authentication' => array(
			'http' => array(
				'accept_schemes' => array('basic'),
				'realm' => 'Pandora',
			),
		),*/
		'authorization' => array(
            'deny_by_default' => false
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'dompdf_module' => array(
        'enable_php' => true
    )
);
