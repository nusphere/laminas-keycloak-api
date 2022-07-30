<?php

use Keycloak\Admin\KeycloakClient;
use Laminas\KeyCloak\Api\Command;
use Laminas\KeyCloak\Api\Factory;
use Laminas\KeyCloak\Api\Options;
use Laminas\KeyCloak\Api\Services;

return [
    'laminas-cli' => [
        'commands' => [
            Command\Client\CreateCommand::getDefaultName() => Command\Client\CreateCommand::class,
            Command\Realm\ImportCommand::getDefaultName() => Command\Realm\ImportCommand::class,
            Command\Realm\CreateCommand::getDefaultName() => Command\Realm\CreateCommand::class,
            Command\Realm\DeleteCommand::getDefaultName() => Command\Realm\DeleteCommand::class,
        ]
    ],

    'service_manager' => [
        'factories' => [
            // Commands
            Command\Client\CreateCommand::class => Factory\KeyCloakCommandFactory::class,
            Command\Realm\ImportCommand::class => Factory\KeyCloakCommandFactory::class,
            Command\Realm\CreateCommand::class => Factory\KeyCloakCommandFactory::class,
            Command\Realm\DeleteCommand::class => Factory\KeyCloakCommandFactory::class,

            // Options
            Options\KeyCloakOptions::class => Factory\KeyCloakOptionsFactory::class,

            // Services
            Services\RealmServices::class => Factory\KeyCloakServicesFactory::class,
            Services\ClientServices::class => Factory\KeyCloakServicesFactory::class,

            // External Services
            KeycloakClient::class => Factory\KeyCloakClientFactory::class,
        ]
    ]
];
