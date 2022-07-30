<?php

namespace Laminas\KeyCloak\Api\Command\Client;

use Keycloak\Admin\KeycloakClient;
use Laminas\KeyCloak\Api\Exception\ClientException;
use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\RealmException;
use Laminas\KeyCloak\Api\Exception\WarningException;
use Laminas\KeyCloak\Api\Model\Client;
use Laminas\KeyCloak\Api\Model\Realm;
use Laminas\KeyCloak\Api\Services\ClientServices;
use Laminas\KeyCloak\Api\Services\RealmServices;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateCommand extends Command
{
    protected static $defaultName = 'keycloak:client:create';
    protected static $defaultDescription = 'create a client to a given realm';

    private ClientServices $clientServices;

    public function __construct(ClientServices $clientServices)
    {
        parent::__construct(self::$defaultName);
        $this->clientServices = $clientServices;
    }

    protected function configure()
    {
        $this->addArgument(
            'realm-name',
            InputArgument::OPTIONAL,
            'name of the realm'
        );


        $this->addArgument(
            'client-name',
            InputArgument::OPTIONAL,
            'name for the client'
        );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $realm = new Realm();
            $realm->setRealm($input->getArgument('realm-name'));

            $client = new Client();
            $client->setClientId($input->getArgument('client-name') ?? 'client-' . random_int(0, 99999999));

            $this->clientServices->createClient($realm, $client);

            $output->writeln('<info>Client "' . $client->getClientId() . '" successfully created</info>');

            return Command::SUCCESS;
        } catch (WarningException | ClientException $e) {
            $output->writeln('<comment>Warning: ' . $e->getMessage() . '</comment>');

            return $input->hasOption('stop-at-warning') ? Command::FAILURE : Command::SUCCESS;
        } catch (ErrorException $e) {
            $output->writeln('<error>ERROR: ' . $e->getMessage() . '</error>');

            return Command::INVALID;
        }
    }
}
