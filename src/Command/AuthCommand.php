<?php

namespace Laminas\KeyCloak\Api\Command;

use Keycloak\Admin\KeycloakClient;
use Laminas\KeyCloak\Api\Service\AuthenticationService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class AuthCommand extends Command
{
    protected static $defaultName = 'keycloak:auth';
    private KeycloakClient $keycloakClient;

    public function __construct(KeycloakClient $keycloakClient)
    {
        parent::__construct(self::$defaultName);
        $this->keycloakClient = $keycloakClient;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln($this->keycloakClient->get(), OutputInterface::OUTPUT_RAW);

        return Command::SUCCESS;
    }
}
