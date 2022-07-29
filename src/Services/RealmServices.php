<?php

/** @noinspection NullPointerExceptionInspection - until PHP 8.0 */
/** @noinspection MissingParameterTypeDeclarationInspection - until PHP 8.0 */

namespace Laminas\KeyCloak\Api\Services;

use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\WarningException;
use Laminas\KeyCloak\Api\Exception\RealmException;
use Laminas\KeyCloak\Api\Model\Realm;

class RealmServices extends AdminClient
{
    /**
     * @param string|Realm $realm
     *
     * @throws ErrorException
     * @throws WarningException
     * @throws RealmException
     */
    final public function createRealm($realm): bool
    {
        if (is_string($realm)) {
            $realm = $this->convertRealmNameToRealm($realm);
        }

        if ($this->existsRealm($realm)) {
            throw new RealmException('Realm ' . $realm->getRealm() . ' still exists');
        }

        $result = $this->getKeycloakClient()->importRealm($this->getHydrator()->extract($realm));

        $this->checkResponseError($result);
        $this->checkResponseWarnings($result);

        return true;
    }

    /**
     * @param string|Realm $realm
     *
     * @throws ErrorException
     * @throws WarningException
     * @throws RealmException
     */
    final public function deleteRealm($realm): bool
    {
        if (is_string($realm)) {
            $realm = $this->convertRealmNameToRealm($realm);
        }

        if (!$this->existsRealm($realm)) {
            throw new RealmException('Realm ' . $realm->getRealm() . ' does not exists');
        }

        $result = $this->getKeycloakClient()->deleteRealm($this->getHydrator()->extract($realm));

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
        $realm = $this->getRealmByJson($jsonFile);

        if ($this->existsRealm($realm->getRealm())) {
            throw new RealmException('Realm ' . $realm->getRealm() . ' still exists');
        }

        $result = $this->getKeycloakClient()->importRealm($this->getHydrator()->extract($realm));

        $this->checkResponseError($result);
        $this->checkResponseWarnings($result);

        return true;
    }

    /**
     * @throws ErrorException
     */
    final public function getRealmByJson(string $jsonFile): Realm
    {
        if (!file_exists($jsonFile)) {
            throw new ErrorException('Cant find importfile ' . $jsonFile);
        }

        $realmArray = json_decode(file_get_contents($jsonFile), true);

        return $this->getHydrator()->hydrate($realmArray, new Realm());
    }

    /**
     * @param string|Realm $realm
     *
     * @throws ErrorException
     * @throws WarningException
     */
    final public function getRealm($realm): Realm
    {
        if (is_string($realm)) {
            $realm = $this->convertRealmNameToRealm($realm);
        }

        $result = $this->getKeycloakClient()->getRealm(['realm' => $realm->getRealm()]);

        $this->checkResponseError($result);
        $this->checkResponseWarnings($result);

        return $this->getHydrator()->hydrate($result, new Realm());
    }

    /**
     * @param string|Realm $realm
     */
    final public function existsRealm($realm): bool
    {
        if (is_string($realm)) {
            $realm = $this->convertRealmNameToRealm($realm);
        }

        try {
            $this->getRealm($realm);
        } catch (ErrorException | WarningException $e) {
            return false;
        }

        return true;
    }

    private function convertRealmNameToRealm(string $realmName): Realm
    {
        return $this->getHydrator()->hydrate(['realm' => $realmName], new Realm());
    }
}
