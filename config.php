<?php

use Monolog\Logger as MonologLogger;

$db = getenv('DATABASE_URL');

if ($db) {
    $dbopts = parse_url($db);
    $dsn_template = "%s:host=%s;port=%s;dbname=%s";
    $dbopts['dsn'] = sprintf(
        $dsn_template,
        'pgsql',
        $dbopts["host"],
        $dbopts["port"],
        ltrim($dbopts["path"],'/')
    );
} else {
    $dbopts = [
        "user" => 'root',
        "pass" => '',
        "dsn" => 'mysql:host=127.0.0.1;dbname=inkmaster_db',
    ];
}

return [
    'database' => [
        'username' => $dbopts['user'],
        'password' => $dbopts['pass'],
        'connection' => $dbopts['dsn'],
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'logger' => [
        'level' => MonologLogger::INFO
    ],
    'twig' => [
        'templates_dir' => __DIR__ . '/app/views',
        'templates_cache_dir' => __DIR__ . '/app/views/cache'
    ]
];
