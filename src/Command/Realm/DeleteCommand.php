<?php

namespace Laminas\KeyCloak\Api\Command\Realm;

use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\WarningException;
use Laminas\KeyCloak\Api\Exception\RealmException;
use Laminas\KeyCloak\Api\Services\RealmServices;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class DeleteCommand extends Command
{
    protected static $defaultName = 'keycloak:realms:delete';
    protected static $defaultDescription = 'delete a realm with given realm name';

    private RealmServices $realmService;

    public function __construct(RealmServices $realmService)
    {
        $this->realmService = $realmService;

        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this->addArgument('realm-name', InputArgument::REQUIRED, 'name for the realm');
        $this->addOption('stop-at-warning', null, InputOption::VALUE_OPTIONAL);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $name = $input->getArgument('realm-name');

            $this->realmService->deleteRealm($name);

            $output->writeln('<info>Realm "' . $name . '" was successfully deleted.</info>');
            return Command::SUCCESS;

        } catch (WarningException | RealmException $e) {
            $output->writeln('<comment>Warning: ' . $e->getMessage() . '</comment>');

            return $input->hasOption('stop-at-warning') ? Command::FAILURE : Command::SUCCESS;
        } catch (ErrorException $e) {
            $output->writeln('<error>ERROR: ' . $e->getMessage() . '</error>');

            return Command::INVALID;
        }
    }
}
