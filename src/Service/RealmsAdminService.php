<?php

namespace Laminas\KeyCloak\Api\Service;

use Laminas\Http\Request;
use Laminas\KeyCloak\Api\Model\RealmRepresentation;

class RealmsAdminService extends ApiService
{
    public function getRealm(?string $realmName = null): RealmRepresentation
    {
        $request = new Request();
        $request->setMethod(Request::METHOD_GET);
        $request->setUri(
            $this->getKeyCloakOptions()->getFullHostname() . '/realms/' . $realmName ?? $this->getKeyCloakOptions()->getRealm());

        $response = $this->getApiClient()->send($request);

        $realmJson = json_decode($response->getBody(), true);

        var_dump($realmJson);

        $realm = new RealmRepresentation();
        $realm->setRealm($realmJson['realm']);
        $realm->setPublicKey($realmJson['public_key']);
        $realm->setTokenService($realmJson['token-service']);
        $realm->setAccountService($realmJson['account-service']);
        $realm->setTokenNotBefore($realmJson['tokens-not-before']);

        return $realm;
    }
}
