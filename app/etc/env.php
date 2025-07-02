<?php
return [
    'backend' => [
        'frontName' => 'admin'
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'puo1jMTanOCdX1nnjzxcFq3dZ2U62Lbc'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => '829_'
            ],
            'page_cache' => [
                'id_prefix' => '829_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'remote_storage' => [
        'driver' => 'file'
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => 'a2de9f064abda9bd449cf842e2be6413'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'magentodb246',
                'username' => 'magentouser246',
                'password' => 'magentouser246',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        'magento246.m2'
    ],
    'install' => [
        'date' => 'Mon, 30 Jun 2025 03:31:36 +0000'
    ],
    'system' => [
        'default' => [
            'web' => [
                'unsecure' => [
                    'base_url' => 'https://magento246.m2/',
                    'base_link_url' => '{{unsecure_base_url}}',
                    'base_static_url' => '',
                    'base_media_url' => ''
                ],
                'secure' => [
                    'base_url' => 'https://magento246.m2/',
                    'base_link_url' => '{{secure_base_url}}',
                    'base_static_url' => '',
                    'base_media_url' => '',
                    'use_in_frontend' => 0,
                    'use_in_adminhtml' => 0
                ],
                'cookie' => [
                    'cookie_lifetime' => 864000
                ]
            ]
        ]
    ]
];
