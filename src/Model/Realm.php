<?php

namespace Laminas\KeyCloak\Api\Model;

class Realm
{
    private ?string $id = null;
    private ?string $realm = null;
    private ?string $displayName = null;
    private ?string $displayNameHtml = null;
    private int $notBefore = 0;
    private string $defaultSignatureAlgorithm = "RS256";
    private bool $revokeRefreshToken = false;
    private int $refreshTokenMaxReuse = 0;
    private int $accessTokenLifespan = 60;
    private int $accessTokenLifespanForImplicitFlow = 900;
    private int $ssoSessionIdleTimeout = 1800;
    private int $ssoSessionMaxLifespan = 36000;
    private int $ssoSessionIdleTimeoutRememberMe = 0;
    private int $ssoSessionMaxLifespanRememberMe = 0;
    private int $offlineSessionIdleTimeout = 2592000;
    private bool $offlineSessionMaxLifespanEnabled = false;
    private int $offlineSessionMaxLifespan = 5184000;
    private int $clientSessionIdleTimeout = 0;
    private int $clientSessionMaxLifespan = 0;
    private int $clientOfflineSessionIdleTimeout = 0;
    private int $clientOfflineSessionMaxLifespan = 0;
    private int $accessCodeLifespan = 60;
    private int $accessCodeLifespanUserAction = 300;
    private int $accessCodeLifespanLogin = 1800;
    private int $actionTokenGeneratedByAdminLifespan = 43200;
    private int $actionTokenGeneratedByUserLifespan = 300;
    private int $oauth2DeviceCodeLifespan = 600;
    private int $oauth2DevicePollingInterval = 600;
    private bool $enabled = false;
    private string $sslRequired = "external";
    private bool $registrationAllowed = false;
    private bool $registrationEmailAsUsername = false;
    private bool $rememberMe = false;
    private bool $verifyEmail = false;
    private bool $loginWithEmailAllowed = true;
    private bool $duplicateEmailsAllowed = false;
    private bool $resetPasswordAllowed = false;
    private bool $editUsernameAllowed = false;
    private bool $bruteForceProtected = false;
    private bool $permanentLockout = false;
    private int $maxFailureWaitSeconds = 900;
    private int $minimumQuickLoginWaitSeconds = 60;
    private int $waitIncrementSeconds = 60;
    private int $quickLoginCheckMilliSeconds = 1000;
    private int $maxDeltaTimeSeconds = 43200;
    private int $failureFactor = 30;

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
     * @return string|null
     */
    public function getRealm(): ?string
    {
        return $this->realm;
    }

    /**
     * @param string|null $realm
     */
    public function setRealm(?string $realm): void
    {
        $this->realm = $realm;
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
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param string|null $displayName
     */
    public function setDisplayName(?string $displayName): void
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string|null
     */
    public function getDisplayNameHtml(): ?string
    {
        return $this->displayNameHtml;
    }

    /**
     * @param string|null $displayNameHtml
     */
    public function setDisplayNameHtml(?string $displayNameHtml): void
    {
        $this->displayNameHtml = $displayNameHtml;
    }

    /**
     * @return string
     */
    public function getDefaultSignatureAlgorithm(): string
    {
        return $this->defaultSignatureAlgorithm;
    }

    /**
     * @param string $defaultSignatureAlgorithm
     */
    public function setDefaultSignatureAlgorithm(string $defaultSignatureAlgorithm): void
    {
        $this->defaultSignatureAlgorithm = $defaultSignatureAlgorithm;
    }

    /**
     * @return bool
     */
    public function isRevokeRefreshToken(): bool
    {
        return $this->revokeRefreshToken;
    }

    /**
     * @param bool $revokeRefreshToken
     */
    public function setRevokeRefreshToken(bool $revokeRefreshToken): void
    {
        $this->revokeRefreshToken = $revokeRefreshToken;
    }

    /**
     * @return int
     */
    public function getRefreshTokenMaxReuse(): int
    {
        return $this->refreshTokenMaxReuse;
    }

    /**
     * @param int $refreshTokenMaxReuse
     */
    public function setRefreshTokenMaxReuse(int $refreshTokenMaxReuse): void
    {
        $this->refreshTokenMaxReuse = $refreshTokenMaxReuse;
    }

    /**
     * @return int
     */
    public function getAccessTokenLifespan(): int
    {
        return $this->accessTokenLifespan;
    }

    /**
     * @param int $accessTokenLifespan
     */
    public function setAccessTokenLifespan(int $accessTokenLifespan): void
    {
        $this->accessTokenLifespan = $accessTokenLifespan;
    }

    /**
     * @return int
     */
    public function getAccessTokenLifespanForImplicitFlow(): int
    {
        return $this->accessTokenLifespanForImplicitFlow;
    }

    /**
     * @param int $accessTokenLifespanForImplicitFlow
     */
    public function setAccessTokenLifespanForImplicitFlow(int $accessTokenLifespanForImplicitFlow): void
    {
        $this->accessTokenLifespanForImplicitFlow = $accessTokenLifespanForImplicitFlow;
    }

    /**
     * @return int
     */
    public function getSsoSessionIdleTimeout(): int
    {
        return $this->ssoSessionIdleTimeout;
    }

    /**
     * @param int $ssoSessionIdleTimeout
     */
    public function setSsoSessionIdleTimeout(int $ssoSessionIdleTimeout): void
    {
        $this->ssoSessionIdleTimeout = $ssoSessionIdleTimeout;
    }

    /**
     * @return int
     */
    public function getSsoSessionMaxLifespan(): int
    {
        return $this->ssoSessionMaxLifespan;
    }

    /**
     * @param int $ssoSessionMaxLifespan
     */
    public function setSsoSessionMaxLifespan(int $ssoSessionMaxLifespan): void
    {
        $this->ssoSessionMaxLifespan = $ssoSessionMaxLifespan;
    }

    /**
     * @return int
     */
    public function getSsoSessionIdleTimeoutRememberMe(): int
    {
        return $this->ssoSessionIdleTimeoutRememberMe;
    }

    /**
     * @param int $ssoSessionIdleTimeoutRememberMe
     */
    public function setSsoSessionIdleTimeoutRememberMe(int $ssoSessionIdleTimeoutRememberMe): void
    {
        $this->ssoSessionIdleTimeoutRememberMe = $ssoSessionIdleTimeoutRememberMe;
    }

    /**
     * @return int
     */
    public function getSsoSessionMaxLifespanRememberMe(): int
    {
        return $this->ssoSessionMaxLifespanRememberMe;
    }

    /**
     * @param int $ssoSessionMaxLifespanRememberMe
     */
    public function setSsoSessionMaxLifespanRememberMe(int $ssoSessionMaxLifespanRememberMe): void
    {
        $this->ssoSessionMaxLifespanRememberMe = $ssoSessionMaxLifespanRememberMe;
    }

    /**
     * @return int
     */
    public function getOfflineSessionIdleTimeout(): int
    {
        return $this->offlineSessionIdleTimeout;
    }

    /**
     * @param int $offlineSessionIdleTimeout
     */
    public function setOfflineSessionIdleTimeout(int $offlineSessionIdleTimeout): void
    {
        $this->offlineSessionIdleTimeout = $offlineSessionIdleTimeout;
    }

    /**
     * @return bool
     */
    public function isOfflineSessionMaxLifespanEnabled(): bool
    {
        return $this->offlineSessionMaxLifespanEnabled;
    }

    /**
     * @param bool $offlineSessionMaxLifespanEnabled
     */
    public function setOfflineSessionMaxLifespanEnabled(bool $offlineSessionMaxLifespanEnabled): void
    {
        $this->offlineSessionMaxLifespanEnabled = $offlineSessionMaxLifespanEnabled;
    }

    /**
     * @return int
     */
    public function getOfflineSessionMaxLifespan(): int
    {
        return $this->offlineSessionMaxLifespan;
    }

    /**
     * @param int $offlineSessionMaxLifespan
     */
    public function setOfflineSessionMaxLifespan(int $offlineSessionMaxLifespan): void
    {
        $this->offlineSessionMaxLifespan = $offlineSessionMaxLifespan;
    }

    /**
     * @return int
     */
    public function getClientSessionIdleTimeout(): int
    {
        return $this->clientSessionIdleTimeout;
    }

    /**
     * @param int $clientSessionIdleTimeout
     */
    public function setClientSessionIdleTimeout(int $clientSessionIdleTimeout): void
    {
        $this->clientSessionIdleTimeout = $clientSessionIdleTimeout;
    }

    /**
     * @return int
     */
    public function getClientSessionMaxLifespan(): int
    {
        return $this->clientSessionMaxLifespan;
    }

    /**
     * @param int $clientSessionMaxLifespan
     */
    public function setClientSessionMaxLifespan(int $clientSessionMaxLifespan): void
    {
        $this->clientSessionMaxLifespan = $clientSessionMaxLifespan;
    }

    /**
     * @return int
     */
    public function getClientOfflineSessionIdleTimeout(): int
    {
        return $this->clientOfflineSessionIdleTimeout;
    }

    /**
     * @param int $clientOfflineSessionIdleTimeout
     */
    public function setClientOfflineSessionIdleTimeout(int $clientOfflineSessionIdleTimeout): void
    {
        $this->clientOfflineSessionIdleTimeout = $clientOfflineSessionIdleTimeout;
    }

    /**
     * @return int
     */
    public function getClientOfflineSessionMaxLifespan(): int
    {
        return $this->clientOfflineSessionMaxLifespan;
    }

    /**
     * @param int $clientOfflineSessionMaxLifespan
     */
    public function setClientOfflineSessionMaxLifespan(int $clientOfflineSessionMaxLifespan): void
    {
        $this->clientOfflineSessionMaxLifespan = $clientOfflineSessionMaxLifespan;
    }

    /**
     * @return int
     */
    public function getAccessCodeLifespan(): int
    {
        return $this->accessCodeLifespan;
    }

    /**
     * @param int $accessCodeLifespan
     */
    public function setAccessCodeLifespan(int $accessCodeLifespan): void
    {
        $this->accessCodeLifespan = $accessCodeLifespan;
    }

    /**
     * @return int
     */
    public function getAccessCodeLifespanUserAction(): int
    {
        return $this->accessCodeLifespanUserAction;
    }

    /**
     * @param int $accessCodeLifespanUserAction
     */
    public function setAccessCodeLifespanUserAction(int $accessCodeLifespanUserAction): void
    {
        $this->accessCodeLifespanUserAction = $accessCodeLifespanUserAction;
    }

    /**
     * @return int
     */
    public function getAccessCodeLifespanLogin(): int
    {
        return $this->accessCodeLifespanLogin;
    }

    /**
     * @param int $accessCodeLifespanLogin
     */
    public function setAccessCodeLifespanLogin(int $accessCodeLifespanLogin): void
    {
        $this->accessCodeLifespanLogin = $accessCodeLifespanLogin;
    }

    /**
     * @return int
     */
    public function getActionTokenGeneratedByAdminLifespan(): int
    {
        return $this->actionTokenGeneratedByAdminLifespan;
    }

    /**
     * @param int $actionTokenGeneratedByAdminLifespan
     */
    public function setActionTokenGeneratedByAdminLifespan(int $actionTokenGeneratedByAdminLifespan): void
    {
        $this->actionTokenGeneratedByAdminLifespan = $actionTokenGeneratedByAdminLifespan;
    }

    /**
     * @return int
     */
    public function getActionTokenGeneratedByUserLifespan(): int
    {
        return $this->actionTokenGeneratedByUserLifespan;
    }

    /**
     * @param int $actionTokenGeneratedByUserLifespan
     */
    public function setActionTokenGeneratedByUserLifespan(int $actionTokenGeneratedByUserLifespan): void
    {
        $this->actionTokenGeneratedByUserLifespan = $actionTokenGeneratedByUserLifespan;
    }

    /**
     * @return int
     */
    public function getOauth2DeviceCodeLifespan(): int
    {
        return $this->oauth2DeviceCodeLifespan;
    }

    /**
     * @param int $oauth2DeviceCodeLifespan
     */
    public function setOauth2DeviceCodeLifespan(int $oauth2DeviceCodeLifespan): void
    {
        $this->oauth2DeviceCodeLifespan = $oauth2DeviceCodeLifespan;
    }

    /**
     * @return int
     */
    public function getOauth2DevicePollingInterval(): int
    {
        return $this->oauth2DevicePollingInterval;
    }

    /**
     * @param int $oauth2DevicePollingInterval
     */
    public function setOauth2DevicePollingInterval(int $oauth2DevicePollingInterval): void
    {
        $this->oauth2DevicePollingInterval = $oauth2DevicePollingInterval;
    }

    /**
     * @return string
     */
    public function getSslRequired(): string
    {
        return $this->sslRequired;
    }

    /**
     * @param string $sslRequired
     */
    public function setSslRequired(string $sslRequired): void
    {
        $this->sslRequired = $sslRequired;
    }

    /**
     * @return bool
     */
    public function isRegistrationAllowed(): bool
    {
        return $this->registrationAllowed;
    }

    /**
     * @param bool $registrationAllowed
     */
    public function setRegistrationAllowed(bool $registrationAllowed): void
    {
        $this->registrationAllowed = $registrationAllowed;
    }

    /**
     * @return bool
     */
    public function isRegistrationEmailAsUsername(): bool
    {
        return $this->registrationEmailAsUsername;
    }

    /**
     * @param bool $registrationEmailAsUsername
     */
    public function setRegistrationEmailAsUsername(bool $registrationEmailAsUsername): void
    {
        $this->registrationEmailAsUsername = $registrationEmailAsUsername;
    }

    /**
     * @return bool
     */
    public function isRememberMe(): bool
    {
        return $this->rememberMe;
    }

    /**
     * @param bool $rememberMe
     */
    public function setRememberMe(bool $rememberMe): void
    {
        $this->rememberMe = $rememberMe;
    }

    /**
     * @return bool
     */
    public function isVerifyEmail(): bool
    {
        return $this->verifyEmail;
    }

    /**
     * @param bool $verifyEmail
     */
    public function setVerifyEmail(bool $verifyEmail): void
    {
        $this->verifyEmail = $verifyEmail;
    }

    /**
     * @return bool
     */
    public function isLoginWithEmailAllowed(): bool
    {
        return $this->loginWithEmailAllowed;
    }

    /**
     * @param bool $loginWithEmailAllowed
     */
    public function setLoginWithEmailAllowed(bool $loginWithEmailAllowed): void
    {
        $this->loginWithEmailAllowed = $loginWithEmailAllowed;
    }

    /**
     * @return bool
     */
    public function isDuplicateEmailsAllowed(): bool
    {
        return $this->duplicateEmailsAllowed;
    }

    /**
     * @param bool $duplicateEmailsAllowed
     */
    public function setDuplicateEmailsAllowed(bool $duplicateEmailsAllowed): void
    {
        $this->duplicateEmailsAllowed = $duplicateEmailsAllowed;
    }

    /**
     * @return bool
     */
    public function isResetPasswordAllowed(): bool
    {
        return $this->resetPasswordAllowed;
    }

    /**
     * @param bool $resetPasswordAllowed
     */
    public function setResetPasswordAllowed(bool $resetPasswordAllowed): void
    {
        $this->resetPasswordAllowed = $resetPasswordAllowed;
    }

    /**
     * @return bool
     */
    public function isEditUsernameAllowed(): bool
    {
        return $this->editUsernameAllowed;
    }

    /**
     * @param bool $editUsernameAllowed
     */
    public function setEditUsernameAllowed(bool $editUsernameAllowed): void
    {
        $this->editUsernameAllowed = $editUsernameAllowed;
    }

    /**
     * @return bool
     */
    public function isBruteForceProtected(): bool
    {
        return $this->bruteForceProtected;
    }

    /**
     * @param bool $bruteForceProtected
     */
    public function setBruteForceProtected(bool $bruteForceProtected): void
    {
        $this->bruteForceProtected = $bruteForceProtected;
    }

    /**
     * @return bool
     */
    public function isPermanentLockout(): bool
    {
        return $this->permanentLockout;
    }

    /**
     * @param bool $permanentLockout
     */
    public function setPermanentLockout(bool $permanentLockout): void
    {
        $this->permanentLockout = $permanentLockout;
    }

    /**
     * @return int
     */
    public function getMaxFailureWaitSeconds(): int
    {
        return $this->maxFailureWaitSeconds;
    }

    /**
     * @param int $maxFailureWaitSeconds
     */
    public function setMaxFailureWaitSeconds(int $maxFailureWaitSeconds): void
    {
        $this->maxFailureWaitSeconds = $maxFailureWaitSeconds;
    }

    /**
     * @return int
     */
    public function getMinimumQuickLoginWaitSeconds(): int
    {
        return $this->minimumQuickLoginWaitSeconds;
    }

    /**
     * @param int $minimumQuickLoginWaitSeconds
     */
    public function setMinimumQuickLoginWaitSeconds(int $minimumQuickLoginWaitSeconds): void
    {
        $this->minimumQuickLoginWaitSeconds = $minimumQuickLoginWaitSeconds;
    }

    /**
     * @return int
     */
    public function getWaitIncrementSeconds(): int
    {
        return $this->waitIncrementSeconds;
    }

    /**
     * @param int $waitIncrementSeconds
     */
    public function setWaitIncrementSeconds(int $waitIncrementSeconds): void
    {
        $this->waitIncrementSeconds = $waitIncrementSeconds;
    }

    /**
     * @return int
     */
    public function getQuickLoginCheckMilliSeconds(): int
    {
        return $this->quickLoginCheckMilliSeconds;
    }

    /**
     * @param int $quickLoginCheckMilliSeconds
     */
    public function setQuickLoginCheckMilliSeconds(int $quickLoginCheckMilliSeconds): void
    {
        $this->quickLoginCheckMilliSeconds = $quickLoginCheckMilliSeconds;
    }

    /**
     * @return int
     */
    public function getMaxDeltaTimeSeconds(): int
    {
        return $this->maxDeltaTimeSeconds;
    }

    /**
     * @param int $maxDeltaTimeSeconds
     */
    public function setMaxDeltaTimeSeconds(int $maxDeltaTimeSeconds): void
    {
        $this->maxDeltaTimeSeconds = $maxDeltaTimeSeconds;
    }

    /**
     * @return int
     */
    public function getFailureFactor(): int
    {
        return $this->failureFactor;
    }

    /**
     * @param int $failureFactor
     */
    public function setFailureFactor(int $failureFactor): void
    {
        $this->failureFactor = $failureFactor;
    }
}
