<?php

namespace Laminas\KeyCloak\Api\Services;

use Keycloak\Admin\KeycloakClient;
use Laminas\Hydrator\HydratorAwareTrait;
use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\WarningException;

abstract class AdminClient
{
    use HydratorAwareTrait;

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

    /**
     * @throws ErrorException
     */
    final public function checkResponseError(array $result): void
    {
        if (array_key_exists('error', $result)) {
            throw new ErrorException($result['error']);
        }
    }

    /**
     * @throws WarningException
     */
    final public function checkResponseWarnings(array $result): void
    {
        if (array_key_exists('errorMessage', $result)) {
            throw new WarningException($result['errorMessage']);
        }
    }
}
