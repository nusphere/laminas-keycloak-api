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

final class ImportCommand extends Command
{
    protected static $defaultName = 'keycloak:realms:import';
    protected static $defaultDescription = 'import a realm by a given exported realm json file';

    private RealmServices $realmService;

    public function __construct(RealmServices $realmService)
    {
        $this->realmService = $realmService;

        parent::__construct(self::$defaultName);
    }

    public function configure(): void
    {
        $this->addArgument('fileName', InputArgument::REQUIRED, 'file name for importing the realm');
        $this->addOption('stop-at-warning', null, InputOption::VALUE_NONE);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $importFile = $input->getArgument('fileName');

            $this->realmService->importRealm($importFile);

            $output->writeln('<info>File "' . $importFile . '" was successfully imported.</info>');

            return Command::SUCCESS;
        } catch (WarningException | RealmException $e) {
            $output->writeln('<comment>Warning: ' . $e->getMessage() . '</comment>');

            /** @noinspection PhpUnnecessaryBoolCastInspection */
            return (bool) $input->getOption('stop-at-warning') ? Command::FAILURE : Command::SUCCESS;
        } catch (ErrorException $e) {
            $output->writeln('<error>ERROR: ' . $e->getMessage() . '</error>');

            return Command::INVALID;
        }
    }
}
