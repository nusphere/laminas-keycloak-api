<?php

namespace Laminas\KeyCloak\Api\Command\Client;

use Keycloak\Admin\KeycloakClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateCommand extends Command
{
    protected static $defaultName = 'keycloak:client:create';
    protected static $defaultDescription = 'create a client to a given realm';

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

        $this->keycloakClient->setRealmName($input->getArgument('realm-name'));

        $response = $this->keycloakClient->createClient(
            [
                'clientId' => $input->getArgument('client-name') ?? 'client-'.random_int(0, 99999999),
                'enabled' => true,
                'bearerOnly' => "false",
                'redirectUris'=>["http://localhost:8080/*"],
                'directAccessGrantsEnabled'=>true,
                'clientAuthenticatorType'=>'client-secret',
                'secret'=>'mysecret'
            ]
        );

        if (array_key_exists('error', $response)) {
            $output->writeln('<error>' . $response['error'] . '</error>');

            return Command::INVALID;
        }

        if (array_key_exists('errorMessage', $response)) {
            $output->writeln('<error>' . $response['errorMessage'] . '</error>');

            return Command::FAILURE;
        }


        $output->writeln('<info>Client successfully created</info>');

        return Command::SUCCESS;
    }
}
