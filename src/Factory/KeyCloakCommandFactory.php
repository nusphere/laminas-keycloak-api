<?php

namespace Laminas\KeyCloak\Api\Factory;

use Keycloak\Admin\KeycloakClient;
use Psr\Container\ContainerInterface;

class KeyCloakCommandFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new $requestedName(
            $container->get(KeycloakClient::class)
        );
    }
}
