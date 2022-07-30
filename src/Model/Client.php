<?php

namespace Laminas\KeyCloak\Api\Model;

class Client
{
    private ?string $id = null;
    private ?string $clientId = null;
    private bool $enabled = false;
    private bool $bearerOnly = false;
    private array $redirectUris = ["http://localhost:8080/*"];
    private ?bool $directAccessGrantsEnabled = true;
    private ?string $clientAuthenticatorType = self::AUTH_TYPE_CLIENT_SECRET;

    public const AUTH_TYPE_CLIENT_SECRET = 'client-secret';

    private ?string $secret = null;

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @param string|null $clientId
     */
    public function setClientId(?string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return array
     */
    public function getRedirectUris(): array
    {
        return $this->redirectUris;
    }

    /**
     * @param array $redirectUris
     */
    public function setRedirectUris(array $redirectUris): void
    {
        $this->redirectUris = $redirectUris;
    }

    /**
     * @return bool|null
     */
    public function getDirectAccessGrantsEnabled(): ?bool
    {
        return $this->directAccessGrantsEnabled;
    }

    /**
     * @param bool|null $directAccessGrantsEnabled
     */
    public function setDirectAccessGrantsEnabled(?bool $directAccessGrantsEnabled): void
    {
        $this->directAccessGrantsEnabled = $directAccessGrantsEnabled;
    }

    /**
     * @return string|null
     */
    public function getClientAuthenticatorType(): ?string
    {
        return $this->clientAuthenticatorType;
    }

    /**
     * @param string|null $clientAuthenticatorType
     */
    public function setClientAuthenticatorType(?string $clientAuthenticatorType): void
    {
        $this->clientAuthenticatorType = $clientAuthenticatorType;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     */
    public function setSecret(?string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isBearerOnly(): bool
    {
        return $this->bearerOnly;
    }

    /**
     * @param bool $bearerOnly
     */
    public function setBearerOnly(bool $bearerOnly): void
    {
        $this->bearerOnly = $bearerOnly;
    }
}
