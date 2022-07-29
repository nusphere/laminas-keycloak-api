<?php

namespace Laminas\KeyCloak\Api\Options;

use Laminas\Stdlib\AbstractOptions;

class KeyCloakOptions extends AbstractOptions
{
    private string $hostname = 'localhost';
    private string $scheme = 'http';
    private string $realm = 'master';
    private string $user = 'admin';
    private string $pass = 'admin';
    private int $port = 8080;

    public function getRealmUri(): string
    {
        return $this->getFullHostname() . '/realms/' . $this->getRealm();
    }

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
}