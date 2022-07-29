<?php

namespace Laminas\KeyCloak\Api\Factory;

use Keycloak\Admin\KeycloakClient;
use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\KeyCloak\Api\Services\AdminClient;
use Psr\Container\ContainerInterface;

final class KeyCloakServicesFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        /** @var AdminClient $requestedClass */
        $requestedClass = new $requestedName(
            $container->get(KeycloakClient::class)
        );

        $requestedClass->setHydrator(new ClassMethodsHydrator());

        return $requestedClass;
    }
}
