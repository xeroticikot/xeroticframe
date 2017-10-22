<?php

require 'bin/config.php';

$conf = new \xerotic\Config();

return [
    'paths' => [
        'migrations' => 'models/migrations'
    ],
    'migration_base_class' => '\xerotic\Migration',
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'pass' => DB_PASS,
            'port' => DB_PORT
        ]
    ]
];