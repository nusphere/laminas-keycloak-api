<?php

namespace Laminas\KeyCloak\Api\Command\Realm;

use Keycloak\Admin\KeycloakClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ImportCommand extends Command
{
    protected static $defaultName = 'keycloak:realms:import';

    private KeycloakClient $keycloakClient;

    public function __construct(KeycloakClient $keycloakClient)
    {
        parent::__construct(self::$defaultName);
        $this->keycloakClient = $keycloakClient;
    }

    protected function configure()
    {
        $this->addArgument(
            'fileName',
            InputArgument::REQUIRED,
            'file name for importing the realm'
        );
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $importFile = $input->getArgument('fileName');

        if (!file_exists($importFile)) {
            $output->writeln('<error>Cant find importfile ' . $importFile . '</error>');
        }

        $realmArray = json_decode(file_get_contents($importFile), true);
        $realmInfo = $this->keycloakClient->getRealm(['realm' => $realmArray['name']]);

        // got error, when realm not exists
        if (array_key_exists('error', $realmInfo)) {
            $this->keycloakClient->importRealm($realmArray);

            $output->writeln('<info>'.$importFile.' imported</info>');
        } else {
            $output->writeln('<error>Realm ' . $realmArray['name'] . ' still exists</error>');
        }

        return Command::SUCCESS;
    }
}
