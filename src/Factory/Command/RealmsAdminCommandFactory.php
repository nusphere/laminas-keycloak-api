<?php

namespace Laminas\KeyCloak\Api\Factory\Command;

use Laminas\KeyCloak\Api\Command\RealmsAdminCommand;
use Laminas\KeyCloak\Api\Factory\KeyCloakApiFactory;
use Laminas\KeyCloak\Api\Service\RealmsAdminService;
use Psr\Container\ContainerInterface;

class RealmsAdminCommandFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        return new RealmsAdminCommand(
            $container->get(RealmsAdminService::class)
        );
    }
}
