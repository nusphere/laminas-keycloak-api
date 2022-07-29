<?php

namespace Laminas\KeyCloak\Api\Command;

use Laminas\KeyCloak\Api\Service\RealmsAdminService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class RealmsAdminCommand extends Command
{
    protected static $defaultName = 'keycloak:realms:info';
    private RealmsAdminService $realmsAdminService;

    public function __construct(RealmsAdminService $realmsAdminService)
    {
        parent::__construct(self::$defaultName);
        $this->realmsAdminService = $realmsAdminService;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        var_dump($this->realmsAdminService->getRealm());

        return Command::SUCCESS;
    }
}
