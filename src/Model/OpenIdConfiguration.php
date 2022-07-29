<?php

namespace Laminas\KeyCloak\Api\Model;

class OpenIdConfiguration
{
    private string $issuer;
    private string $authorizationEndpoint;
    private string $tokenEndpoint;
    private string $introspectionEndpoint;
    private string $userInfoEndpoint;
    private string $endSessionEndpoint;

    /**
     * @return string
     */
    public function getIssuer(): string
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     */
    public function setIssuer(string $issuer): void
    {
        $this->issuer = $issuer;
    }

    /**
     * @return string
     */
    public function getAuthorizationEndpoint(): string
    {
        return $this->authorizationEndpoint;
    }

    /**
     * @param string $authorizationEndpoint
     */
    public function setAuthorizationEndpoint(string $authorizationEndpoint): void
    {
        $this->authorizationEndpoint = $authorizationEndpoint;
    }

    /**
     * @return string
     */
    public function getTokenEndpoint(): string
    {
        return $this->tokenEndpoint;
    }

    /**
     * @param string $tokenEndpoint
     */
    public function setTokenEndpoint(string $tokenEndpoint): void
    {
        $this->tokenEndpoint = $tokenEndpoint;
    }

    /**
     * @return string
     */
    public function getIntrospectionEndpoint(): string
    {
        return $this->introspectionEndpoint;
    }

    /**
     * @param string $introspectionEndpoint
     */
    public function setIntrospectionEndpoint(string $introspectionEndpoint): void
    {
        $this->introspectionEndpoint = $introspectionEndpoint;
    }

    /**
     * @return string
     */
    public function getUserInfoEndpoint(): string
    {
        return $this->userInfoEndpoint;
    }

    /**
     * @param string $userInfoEndpoint
     */
    public function setUserInfoEndpoint(string $userInfoEndpoint): void
    {
        $this->userInfoEndpoint = $userInfoEndpoint;
    }

    /**
     * @return string
     */
    public function getEndSessionEndpoint(): string
    {
        return $this->endSessionEndpoint;
    }

    /**
     * @param string $endSessionEndpoint
     */
    public function setEndSessionEndpoint(string $endSessionEndpoint): void
    {
        $this->endSessionEndpoint = $endSessionEndpoint;
    }


}
