<?php

namespace Laminas\KeyCloak\Api\Model;

final class Token
{
    private ?string $accessToken;
    private ?int $expiresIn;
    private ?int $refreshExpiresIn;
    private ?string $refreshToken;
    private ?string $tokenType;
    private ?int $notBeforePolicy;
    private ?string $sessionState;
    private ?string $scope;

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setAccessToken(?string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function getExpiresIn(): ?int
    {
        return $this->expiresIn;
    }

    public function setExpiresIn(?int $expiresIn): void
    {
        $this->expiresIn = $expiresIn;
    }

    public function getRefreshExpiresIn(): ?int
    {
        return $this->refreshExpiresIn;
    }

    public function setRefreshExpiresIn(?int $refreshExpiresIn): void
    {
        $this->refreshExpiresIn = $refreshExpiresIn;
    }

    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    public function setRefreshToken(?string $refreshToken): void
    {
        $this->refreshToken = $refreshToken;
    }

    public function getTokenType(): ?string
    {
        return $this->tokenType;
    }

    public function setTokenType(?string $type): void
    {
        $this->tokenType = $type;
    }

    public function getNotBeforePolicy(): ?int
    {
        return $this->notBeforePolicy;
    }

    public function setNotBeforePolicy(?int $notBeforePolicy): void
    {
        $this->notBeforePolicy = $notBeforePolicy;
    }

    public function getSessionState(): ?string
    {
        return $this->sessionState;
    }

    public function setSessionState(?string $sessionState): void
    {
        $this->sessionState = $sessionState;
    }

    public function getScope(): ?string
    {
        return $this->scope;
    }

    public function setScope(?string $scope): void
    {
        $this->scope = $scope;
    }
}
