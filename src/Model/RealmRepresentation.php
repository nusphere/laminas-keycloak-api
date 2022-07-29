<?php

namespace Laminas\KeyCloak\Api\Model;

class RealmRepresentation
{
    private string $realm;
    private string $publicKey;
    private string $tokenService;
    private string $accountService;
    private int $tokenNotBefore;

    /**
     * @return string
     */
    public function getRealm(): string
    {
        return $this->realm;
    }

    /**
     * @param string $realm
     */
    public function setRealm(string $realm): void
    {
        $this->realm = $realm;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @param string $publicKey
     */
    public function setPublicKey(string $publicKey): void
    {
        $this->publicKey = $publicKey;
    }

    /**
     * @return string
     */
    public function getTokenService(): string
    {
        return $this->tokenService;
    }

    /**
     * @param string $tokenService
     */
    public function setTokenService(string $tokenService): void
    {
        $this->tokenService = $tokenService;
    }

    /**
     * @return string
     */
    public function getAccountService(): string
    {
        return $this->accountService;
    }

    /**
     * @param string $accountService
     */
    public function setAccountService(string $accountService): void
    {
        $this->accountService = $accountService;
    }

    /**
     * @return int
     */
    public function getTokenNotBefore(): int
    {
        return $this->tokenNotBefore;
    }

    /**
     * @param int $tokenNotBefore
     */
    public function setTokenNotBefore(int $tokenNotBefore): void
    {
        $this->tokenNotBefore = $tokenNotBefore;
    }


}
