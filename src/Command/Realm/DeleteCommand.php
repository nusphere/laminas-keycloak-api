<?php

namespace Laminas\KeyCloak\Api\Command\Realm;

use Keycloak\Admin\KeycloakClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class DeleteCommand extends Command
{
    protected static $defaultName = 'keycloak:realms:delete';

    private KeycloakClient $keycloakClient;

    public function __construct(KeycloakClient $keycloakClient)
    {
        parent::__construct(self::$defaultName);
        $this->keycloakClient = $keycloakClient;
    }

    protected function configure()
    {
        $this->addArgument(
            'realm-name',
            InputArgument::REQUIRED,
            'name for the realm'
        );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $realmName = $input->getArgument('realm-name');

        $realmInfo = $this->keycloakClient->getRealm(['realm' => $realmName]);

        // got error, when realm not exists
        if (!array_key_exists('error', $realmInfo)) {
            $result = $this->keycloakClient->deleteRealm(['realm' => $realmName]);

            if (array_key_exists('errorMessage', $result)) {
                $output->writeln('<info>' . $result['errorMessage'] . '</info>');

                return Command::FAILURE;
            }

            $output->writeln('<info>Realm ' . $realmName . ' delete</info>');
        } else {
            $output->writeln('<error>Realm ' . $realmName . ' does not exists</error>');
        }

        return Command::SUCCESS;
    }
}
