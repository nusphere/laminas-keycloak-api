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
     * @throws ClientException
     * @throws ErrorException
     * @throws WarningException
     */
    final public function getClient(Realm $realm, Client $client): Client
    {
        $this->getKeycloakClient()->setRealmName($realm->getRealm());

        $clients = $this->getKeycloakClient()->getClients([
            'clientId' => $client->getClientId(),
            'first' => 1
        ]);

        $this->checkResponseError($clients);
        $this->checkResponseWarnings($clients);

        if (count($clients) === 1) {
            return $this->getHydrator()->hydrate($clients[0], new Client());
        }

        if (count($clients) === 0) {
            throw new WarningException('This client-Id "' . $client->getClientId() . '" not found');
        }

        throw new ClientException('This client-Id "' . $client->getClientId() . '" not unique');
    }

    /**
     * @throws ClientException
     */
    final public function existsClient(Realm $realm, Client $client): bool
    {
        try {
            $this->getClient($realm, $client);
        } catch (ErrorException | WarningException $e) {
            return false;
        }

        return true;
    }
}
