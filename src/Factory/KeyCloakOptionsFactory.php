<?php

namespace Laminas\KeyCloak\Api\Factory;

use Laminas\KeyCloak\Api\Options\KeyCloakOptions;
use Psr\Container\ContainerInterface;

class KeyCloakOptionsFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $config = $container->get('config');

        return new KeyCloakOptions($config['keycloak_api'] ?? []);
    }
}
