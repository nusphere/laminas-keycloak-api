<?php

namespace Laminas\KeyCloak\Api\Factory;

use Keycloak\Admin\KeycloakClient;
use Laminas\KeyCloak\Api\Command\Realm\CreateCommand;
use Laminas\KeyCloak\Api\Command\Realm\DeleteCommand;
use Laminas\KeyCloak\Api\Command\Realm\ImportCommand;
use Laminas\KeyCloak\Api\Services\RealmServices;
use Psr\Container\ContainerInterface;

class KeyCloakCommandFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        switch ($requestedName) {
            case CreateCommand::class:
            case DeleteCommand::class:
            case ImportCommand::class:
                return new $requestedName($container->get(RealmServices::class));
            default:
                return new $requestedName($container->get(KeycloakClient::class));
        }
    }
}
