<?php

namespace Laminas\KeyCloak\Api\Factory\Command;

use Laminas\KeyCloak\Api\Command\AuthCommand;
use Laminas\KeyCloak\Api\Factory\KeyCloakApiFactory;
use Laminas\KeyCloak\Api\Service\AuthenticationService;
use Psr\Container\ContainerInterface;

class AuthCommandFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new AuthCommand(
            $container->get(AuthenticationService::class)
        );
    }
}
