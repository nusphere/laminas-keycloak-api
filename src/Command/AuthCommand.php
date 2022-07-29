<?php

namespace Laminas\KeyCloak\Api\Command;

use Laminas\KeyCloak\Api\Service\AuthenticationService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class AuthCommand extends Command
{
    protected static $defaultName = 'keycloak:auth';
    private AuthenticationService $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;

        parent::__construct(self::$defaultName);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        var_dump($this->authenticationService->getBearerToken());

        return Command::SUCCESS;
    }
}
