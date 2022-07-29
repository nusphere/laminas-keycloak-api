<?php

namespace Laminas\KeyCloak\Api\Services;

use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\WarningException;
use Laminas\KeyCloak\Api\Exception\RealmException;

class RealmServices extends AdminClient
{
    /**
     * @throws ErrorException
     * @throws WarningException
     * @throws RealmException
     */
    final public function createRealm(string $realmName): bool
    {
        if ($this->existsRealm($realmName)) {
            throw new RealmException('Realm ' . $realmName . ' still exists');
        }

        $result = $this->getKeycloakClient()->importRealm(
            [
                'realm' => $realmName
            ]
        );

        $this->checkResponseError($result);
        $this->checkResponseWarnings($result);

        return true;
    }

    /**
     * @throws ErrorException
     * @throws WarningException
     * @throws RealmException
     */
    final public function deleteRealm(string $realmName): bool
    {
        if (!$this->existsRealm($realmName)) {
            throw new RealmException('Realm ' . $realmName . ' does not exists');
        }

        $result = $this->getKeycloakClient()->deleteRealm(
            [
                'realm' => $realmName
            ]
        );

        $this->checkResponseError($result);
        $this->checkResponseWarnings($result);

        return true;
    }


    /**
     * @throws ErrorException
     * @throws WarningException
     * @throws RealmException
     */
    final public function importRealm(string $jsonFile): bool
    {
        if (!file_exists($jsonFile)) {
            throw new ErrorException('Cant find importfile ' . $jsonFile);
        }

        $realmArray = json_decode(file_get_contents($jsonFile), true);

        if ($this->existsRealm($realmArray['id'])) {
            throw new RealmException('Realm ' . $realmArray['id'] . ' still exists');
        }

        $result = $this->getKeycloakClient()->importRealm($realmArray);

        $this->checkResponseError($result);
        $this->checkResponseWarnings($result);

        return true;
    }

    final public function existsRealm(string $realmName): bool
    {
        $realmInfo = $this->getKeycloakClient()->getRealm(['realm' => $realmName]);

        return !array_key_exists('error', $realmInfo);
    }
}
