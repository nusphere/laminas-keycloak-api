<?php

namespace Laminas\KeyCloak\Api\Command\Client;

use Laminas\KeyCloak\Api\Exception\ClientException;
use Laminas\KeyCloak\Api\Exception\ErrorException;
use Laminas\KeyCloak\Api\Exception\WarningException;
use Laminas\KeyCloak\Api\Model\Realm;
use Laminas\KeyCloak\Api\Services\ClientServices;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ListCommand extends Command
{
    protected static $defaultName = 'keycloak:client:list';
    protected static $defaultDescription = 'list all client to a given realm';

    private ClientServices $clientServices;

    public function __construct(ClientServices $clientServices)
    {
        parent::__construct(self::$defaultName);
        $this->clientServices = $clientServices;
    }

    public function configure(): void
    {
        $this->addArgument('realm-name', InputArgument::REQUIRED, 'name for the realm');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $realm = new Realm();
            $realm->setRealm($input->getArgument('realm-name'));

            $clients = $this->clientServices->getClients($realm);

            $output->writeln(
                '<info>Found ' . count($clients) . ' clients at Realm "' . $realm->getRealm() . '"</info>'
            );

            foreach ($clients as $client) {
                $output->writeln($client->getId() . ' - ' . $client->getClientId() . ' - ');
            }

            return Command::SUCCESS;
        } catch (WarningException | ClientException $e) {
            $output->writeln('<comment>Warning: ' . $e->getMessage() . '</comment>');

            /** @noinspection PhpCastIsUnnecessaryInspection */
            return (bool) $input->getOption('stop-at-warning') ? Command::FAILURE : Command::SUCCESS;
        } catch (ErrorException $e) {
            $output->writeln('<error>ERROR: ' . $e->getMessage() . '</error>');

            return Command::INVALID;
        }
    }
}
