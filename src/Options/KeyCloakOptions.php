<?php

namespace Laminas\KeyCloak\Api\Options;

use Laminas\Stdlib\AbstractOptions;

final class KeyCloakOptions extends AbstractOptions
{
    private string $hostname = 'localhost';
    private string $scheme = 'http';
    private string $realm = 'master';
    private string $clientId = 'admin-cli';
    private string $user = 'admin';
    private string $pass = 'admin';
    private int $port = 8080;

    public function getFullHostname(): string
    {
        return $this->getScheme() . '://' . $this->getHostname() . ':' . $this->getPort();
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function setHostname(string $hostname): void
    {
        $this->hostname = $hostname;
    }

    public function getRealm(): string
    {
        return $this->realm;
    }

    public function setRealm(string $realm): void
    {
        $this->realm = $realm;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    public function getPassword(): string
    {
        return $this->pass;
    }

    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function setScheme(string $scheme): void
    {
        $this->scheme = $scheme;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }
}
