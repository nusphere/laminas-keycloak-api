<?php

namespace Laminas\KeyCloak\Api\Command\Realm;

use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\WarningException;
use Laminas\KeyCloak\Api\Exception\RealmException;
use Laminas\KeyCloak\Api\Model\Realm;
use Laminas\KeyCloak\Api\Services\RealmServices;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class CreateCommand extends Command
{
    protected static $defaultName = 'keycloak:realms:create';
    protected static $defaultDescription = 'create a realm without configuration';

    private RealmServices $realmService;

    public function __construct(RealmServices $realmService)
    {
        $this->realmService = $realmService;

        parent::__construct(self::$defaultName);
    }

    public function configure(): void
    {
        $this->addArgument('realm-name', InputArgument::REQUIRED, 'name for the realm');
        $this->addOption('stop-at-warning', null, InputOption::VALUE_OPTIONAL);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $realm = new Realm();
            $realm->setRealm($input->getArgument('realm-name'));

            $this->realmService->createRealm($realm);

            $output->writeln('<info>Realm "' . $realm->getRealm() . '" was successfully created.</info>');

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
