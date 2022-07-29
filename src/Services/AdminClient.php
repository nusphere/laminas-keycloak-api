<?php

namespace Laminas\KeyCloak\Api\Services;

use Keycloak\Admin\KeycloakClient;

abstract class AdminClient
{
    private KeycloakClient $keycloakClient;

    public function __construct(KeycloakClient $keycloakClient)
    {
        $this->setKeycloakClient($keycloakClient);
    }

    final public function getKeycloakClient(): KeycloakClient
    {
        return $this->keycloakClient;
    }

    final public function setKeycloakClient(KeycloakClient $keycloakClient): void
    {
        $this->keycloakClient = $keycloakClient;
    }
}
