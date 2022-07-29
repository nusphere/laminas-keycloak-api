<?php

namespace Laminas\KeyCloak\Api\Factory\Service;

use Laminas\Http\Client;
use Laminas\KeyCloak\Api\Factory\KeyCloakApiFactory;
use Laminas\KeyCloak\Api\Options\KeyCloakOptions;
use Laminas\KeyCloak\Api\Service\AuthenticationService;
use Psr\Container\ContainerInterface;

class AuthenticationServiceFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new AuthenticationService(
            $container->get(KeyCloakOptions::class),
            new Client(),
        );
    }
}
