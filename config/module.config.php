<?php

use Laminas\KeyCloak\Api\Command;
use Laminas\KeyCloak\Api\Factory;
use Laminas\KeyCloak\Api\Options;
use Laminas\KeyCloak\Api\Service;

return [
    'laminas-cli' => [
        'commands' => [
            Command\AuthCommand::getDefaultName() => Command\AuthCommand::class,
            Command\RealmsAdminCommand::getDefaultName() => Command\RealmsAdminCommand::class,
        ]
    ],

    'service_manager' => [
        'factories' => [
            // Commands
            Command\AuthCommand::class => Factory\Command\AuthCommandFactory::class,
            Command\RealmsAdminCommand::class => Factory\Command\RealmsAdminCommandFactory::class,

            // Options
            Options\KeyCloakOptions::class => Factory\Options\KeyCloakOptionsFactory::class,

            // Service
            Service\AuthenticationService::class => Factory\Service\AuthenticationServiceFactory::class,
            Service\RealmsAdminService::class => Factory\Service\RealmsAdminServiceFactory::class,
        ]
    ]
];
