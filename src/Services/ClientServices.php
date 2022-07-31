<?php

namespace Laminas\KeyCloak\Api\Services;

use Laminas\KeyCloak\Api\Exception\ClientException;
use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\WarningException;
use Laminas\KeyCloak\Api\Model\Client;
use Laminas\KeyCloak\Api\Model\Realm;

class ClientServices extends AdminClient
{
    /**
     * @throws ClientException
     * @throws ErrorException
     * @throws WarningException
     */
    final public function createClient(Realm $realm, Client $client): bool
    {
        $this->getKeycloakClient()->setRealmName($realm->getRealm());

        if ($this->existsClient($realm, $client)) {
            throw new ClientException(
                'Client "' . $client->getClientId() . '" still exists in Realm "' . $realm->getRealm() . '"'
            );
        }

        $result = $this->getKeycloakClient()->createClient($this->getHydrator()->extract($client));

        $this->checkResponseError($result);
        $this->checkResponseWarnings($result);

        return true;
    }

    /**
     * @param Realm $realm
     * @param string $searchString
     * @return Client[]
     *
     * @throws ClientException
     * @throws ErrorException
     * @throws WarningException
     */
    final public function getClients(Realm $realm, string $searchString = null, bool $showInternal = false): array
    {
        $clientArray = [];

        $this->getKeycloakClient()->setRealmName($realm->getRealm());

        $clients = $this->getKeycloakClient()->getClients([
            'clientId' => $searchString,
            'viewableOnly' => !$showInternal
        ]);

        $this->checkResponseError($clients);
        $this->checkResponseWarnings($clients);

        foreach ($clients as $client) {
            $clientArray[] = $this->getHydrator()->hydrate($client, new Client());
        }

        return $clientArray;
    }

    /**
     * @throws ErrorException
     * @throws WarningException
     */
    final public function getClient(Realm $realm, Client $client): Client
    {
        $this->getKeycloakClient()->setRealmName($realm->getRealm());

        $clientResponse = $this->getKeycloakClient()->getClient([
            'id' => $client->getId(),
        ]);

        $this->checkResponseError($clientResponse);
        $this->checkResponseWarnings($clientResponse);

        return $this->getHydrator()->hydrate($clientResponse, new Client());
    }

    /**
     * @throws ClientException
     */
    final public function existsClient(Realm $realm, Client $searchedClient): bool
    {
        try {
            $clients = $this->getClients($realm);

            foreach ($clients as $client) {
                if ($client->getClientId() === $searchedClient->getClientId()) {
                    return true;
                }
            }

            return false;
        } catch (ErrorException | WarningException $e) {
            return false;
        }
    }
}
