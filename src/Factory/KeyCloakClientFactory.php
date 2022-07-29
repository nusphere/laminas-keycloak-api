<?php

namespace Laminas\KeyCloak\Api\Factory;

use Keycloak\Admin\KeycloakClient;
use Laminas\KeyCloak\Api\Options\KeyCloakOptions;
use Psr\Container\ContainerInterface;

class KeyCloakClientFactory extends KeyCloakApiFactory
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $keyCloakOptions = $container->get(KeyCloakOptions::class);

        return KeycloakClient::factory([
            'realm' => $keyCloakOptions->getRealm(),
            'username' => $keyCloakOptions->getUser(),
            'password' => $keyCloakOptions->getPassword(),
            'client_id' => $keyCloakOptions->getClientId(),
            'baseUri' => $keyCloakOptions->getFullHostname(),
        ]);
    }
}
