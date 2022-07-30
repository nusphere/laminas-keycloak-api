<?php

namespace Laminas\KeyCloak\Api\Model;

class Client
{
    public const AUTH_TYPE_CLIENT_SECRET = 'client-secret';

    private ?string $id = null;
    private ?string $clientId = null;
    private ?string $secret = null;
    private ?string $name = null;
    private ?string $rootUrl = null;
    private ?string $baseUrl = null;
    private ?string $clientAuthenticatorType = null;
    private ?string $protocol = null;

    private int $notBefore = 0;
    private int $nodeReRegistrationTimeout = 0;

    private bool $enabled = false;
    private bool $bearerOnly = false;
    private bool $directAccessGrantsEnabled = true;
    private bool $surrogateAuthRequired = false;
    private bool $alwaysDisplayInConsole = false;
    private bool $consentRequired = false;
    private bool $standardFlowEnabled = true;
    private bool $implicitFlowEnabled = false;
    private bool $serviceAccountsEnabled = false;
    private bool $publicClient = true;
    private bool $frontchannelLogout = false;
    private bool $fullScopeAllowed = false;

    private array $webOrigins = [];
    private array $redirectUris = [];
    private array $authenticationFlowBindingOverrides = [];
    private array $optionalClientScopes = [];
    private array $defaultClientScopes = [];
    private array $attributes = [];
    private array $access = [];

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }

    /**
     * @param string $rootUrl
     */
    public function setRootUrl(string $rootUrl): void
    {
        $this->rootUrl = $rootUrl;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return bool
     */
    public function isSurrogateAuthRequired(): bool
    {
        return $this->surrogateAuthRequired;
    }

    /**
     * @param bool $surrogateAuthRequired
     */
    public function setSurrogateAuthRequired(bool $surrogateAuthRequired): void
    {
        $this->surrogateAuthRequired = $surrogateAuthRequired;
    }

    /**
     * @return bool
     */
    public function isAlwaysDisplayInConsole(): bool
    {
        return $this->alwaysDisplayInConsole;
    }

    /**
     * @param bool $alwaysDisplayInConsole
     */
    public function setAlwaysDisplayInConsole(bool $alwaysDisplayInConsole): void
    {
        $this->alwaysDisplayInConsole = $alwaysDisplayInConsole;
    }

    /**
     * @return array
     */
    public function getWebOrigins(): array
    {
        return $this->webOrigins;
    }

    /**
     * @param array $webOrigins
     */
    public function setWebOrigins(array $webOrigins): void
    {
        $this->webOrigins = $webOrigins;
    }

    /**
     * @return int
     */
    public function getNotBefore(): int
    {
        return $this->notBefore;
    }

    /**
     * @param int $notBefore
     */
    public function setNotBefore(int $notBefore): void
    {
        $this->notBefore = $notBefore;
    }

    /**
     * @return bool
     */
    public function isConsentRequired(): bool
    {
        return $this->consentRequired;
    }

    /**
     * @param bool $consentRequired
     */
    public function setConsentRequired(bool $consentRequired): void
    {
        $this->consentRequired = $consentRequired;
    }

    /**
     * @return bool
     */
    public function isStandardFlowEnabled(): bool
    {
        return $this->standardFlowEnabled;
    }

    /**
     * @param bool $standardFlowEnabled
     */
    public function setStandardFlowEnabled(bool $standardFlowEnabled): void
    {
        $this->standardFlowEnabled = $standardFlowEnabled;
    }

    /**
     * @return bool
     */
    public function isImplicitFlowEnabled(): bool
    {
        return $this->implicitFlowEnabled;
    }

    /**
     * @param bool $implicitFlowEnabled
     */
    public function setImplicitFlowEnabled(bool $implicitFlowEnabled): void
    {
        $this->implicitFlowEnabled = $implicitFlowEnabled;
    }

    /**
     * @return bool
     */
    public function isServiceAccountsEnabled(): bool
    {
        return $this->serviceAccountsEnabled;
    }

    /**
     * @param bool $serviceAccountsEnabled
     */
    public function setServiceAccountsEnabled(bool $serviceAccountsEnabled): void
    {
        $this->serviceAccountsEnabled = $serviceAccountsEnabled;
    }

    /**
     * @return bool
     */
    public function isPublicClient(): bool
    {
        return $this->publicClient;
    }

    /**
     * @param bool $publicClient
     */
    public function setPublicClient(bool $publicClient): void
    {
        $this->publicClient = $publicClient;
    }

    /**
     * @return bool
     */
    public function isFrontchannelLogout(): bool
    {
        return $this->frontchannelLogout;
    }

    /**
     * @param bool $frontchannelLogout
     */
    public function setFrontchannelLogout(bool $frontchannelLogout): void
    {
        $this->frontchannelLogout = $frontchannelLogout;
    }

    /**
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol(string $protocol): void
    {
        $this->protocol = $protocol;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return array
     */
    public function getAuthenticationFlowBindingOverrides(): array
    {
        return $this->authenticationFlowBindingOverrides;
    }

    /**
     * @param array $authenticationFlowBindingOverrides
     */
    public function setAuthenticationFlowBindingOverrides(array $authenticationFlowBindingOverrides): void
    {
        $this->authenticationFlowBindingOverrides = $authenticationFlowBindingOverrides;
    }

    /**
     * @return bool
     */
    public function isFullScopeAllowed(): bool
    {
        return $this->fullScopeAllowed;
    }

    /**
     * @param bool $fullScopeAllowed
     */
    public function setFullScopeAllowed(bool $fullScopeAllowed): void
    {
        $this->fullScopeAllowed = $fullScopeAllowed;
    }

    /**
     * @return int
     */
    public function getNodeReRegistrationTimeout(): int
    {
        return $this->nodeReRegistrationTimeout;
    }

    /**
     * @param int $nodeReRegistrationTimeout
     */
    public function setNodeReRegistrationTimeout(int $nodeReRegistrationTimeout): void
    {
        $this->nodeReRegistrationTimeout = $nodeReRegistrationTimeout;
    }

    /**
     * @return array
     */
    public function getOptionalClientScopes(): array
    {
        return $this->optionalClientScopes;
    }

    /**
     * @param array $optionalClientScopes
     */
    public function setOptionalClientScopes(array $optionalClientScopes): void
    {
        $this->optionalClientScopes = $optionalClientScopes;
    }

    /**
     * @return array
     */
    public function getDefaultClientScopes(): array
    {
        return $this->defaultClientScopes;
    }

    /**
     * @param array $defaultClientScopes
     */
    public function setDefaultClientScopes(array $defaultClientScopes): void
    {
        $this->defaultClientScopes = $defaultClientScopes;
    }

    /**
     * @return array
     */
    public function getAccess(): array
    {
        return $this->access;
    }

    /**
     * @param array $access
     */
    public function setAccess(array $access): void
    {
        $this->access = $access;
    }
}
