<?php

namespace Laminas\KeyCloak\Api\Factory;

use Keycloak\Admin\KeycloakClient;
use Laminas\KeyCloak\Api\Command\Realm;
use Laminas\KeyCloak\Api\Command\Client;
use Laminas\KeyCloak\Api\Services\ClientServices;
use Laminas\KeyCloak\Api\Services\RealmServices;
use Psr\Container\ContainerInterface;

final class KeyCloakCommandFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        switch ($requestedName) {
            case Realm\CreateCommand::class:
            case Realm\DeleteCommand::class:
            case Realm\ImportCommand::class:
                return new $requestedName($container->get(RealmServices::class));
            case Client\CreateCommand::class:
            case Client\ListCommand::class:
                return new $requestedName($container->get(ClientServices::class));
            default:
                return new $requestedName($container->get(KeycloakClient::class));
        }
    }
}
