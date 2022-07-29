<?php

return $config = [
    // Retrieve list of modules used in this application.
    'modules' => [
        Laminas\KeyCloak\Api\Module::class,
    ],

    'module_listener_options' => [
        'use_laminas_loader' => false,
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],

        'config_cache_enabled' => false,
        'config_cache_key' => 'cli.config.cache',
        'module_map_cache_enabled' => false,
        'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => dirname(__DIR__) . '/data/cache/',
    ],
];
