<?php

namespace Laminas\KeyCloak\Api\Service;

use Laminas\Http\Client;
use Laminas\Http\Request;
use Laminas\KeyCloak\Api\Model\OpenIdConfiguration;
use Laminas\KeyCloak\Api\Model\Token;
use Laminas\KeyCloak\Api\Options\KeyCloakOptions;
use Laminas\Stdlib\Parameters;

abstract class ApiService
{
    private KeyCloakOptions $keyCloakOptions;
    private Client $client;
    private ?Token $token = null;

    public function __construct(KeyCloakOptions $keyCloakOptions, Client $client)
    {
        $this->keyCloakOptions = $keyCloakOptions;
        $this->client = $client;
    }

    final public function getOpenIdConfiguration(): OpenIdConfiguration
    {
        // TODO: add laminas-cache
        $response = $this
            ->getApiClient(false)
            ->setMethod(Request::METHOD_GET)
            ->setUri($this->getKeyCloakOptions()->getRealmUri() . '/.well-known/openid-configuration')
            ->send();

        $configurationJson = json_decode($response->getBody(), true);

        $openIdConfiguration = new OpenIdConfiguration();
        $openIdConfiguration->setIssuer($configurationJson['issuer']);
        $openIdConfiguration->setAuthorizationEndpoint($configurationJson['authorization_endpoint']);
        $openIdConfiguration->setTokenEndpoint($configurationJson['token_endpoint']);
        $openIdConfiguration->setIntrospectionEndpoint($configurationJson['introspection_endpoint']);
        $openIdConfiguration->setUserInfoEndpoint($configurationJson['userinfo_endpoint']);
        $openIdConfiguration->setEndSessionEndpoint($configurationJson['end_session_endpoint']);

        return $openIdConfiguration;
    }

    final public function getBearerToken(): Token
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_POST);
        $request->setUri($this->getOpenIdConfiguration()->getTokenEndpoint());
        $request->setPost(new Parameters([
            'username' => $this->getKeyCloakOptions()->getUser(),
            'password' => $this->getKeyCloakOptions()->getPassword(),
            'client_id' => 'admin-cli',
            'grant_type' => 'password'
        ]));

        $response = $this->getApiClient(false)->send($request);

        $tokenJson = json_decode($response->getBody(), true);

        $token = new Token();
        $token->setAccessToken($tokenJson['access_token']);
        $token->setExpiresIn($tokenJson['expires_in']);
        $token->setRefreshExpiresIn($tokenJson['refresh_expires_in']);
        $token->setRefreshToken($tokenJson['refresh_token']);
        $token->setTokenType($tokenJson['token_type']);
        $token->setNotBeforePolicy($tokenJson['not-before-policy']);
        $token->setSessionState($tokenJson['session_state']);
        $token->setScope($tokenJson['scope']);

        return $token;
    }

    public function getKeyCloakOptions(): KeyCloakOptions
    {
        return $this->keyCloakOptions;
    }

    public function getToken(): Token
    {
        if ($this->token === null) {
            $this->token = $this->getBearerToken();
        }

        return $this->token;
    }

    public function getApiClient(bool $useToken = true): Client
    {
        $client = $this->client;

        if ($useToken === true) {
            $client->setHeaders([
                'Authorization' => 'Bearer ' . $this->getToken()->getAccessToken()
            ]);
        }

        return $client;
    }
}
