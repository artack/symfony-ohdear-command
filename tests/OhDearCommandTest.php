<?php

declare(strict_types=1);

namespace Artack\SymfonyOhdearCommand\Tests;

use Artack\SymfonyOhdearCommand\OhDearCommand;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;

final class OhDearCommandTest extends TestCase
{
    public function testExecuteWithoutUuidPassesThroughExitCode(): void
    {
        $command = new class extends OhDearCommand {
            protected function configure(): void
            {
                parent::configure();
                $this->setName('test:command');
            }

            protected function doExecute(InputInterface $input, OutputInterface $output): int
            {
                return Command::SUCCESS;
            }
        };

        $tester = new CommandTester($command);
        $tester->execute([]);

        $this->assertSame(Command::SUCCESS, $tester->getStatusCode());
    }

    public function testExecuteWithoutUuidReturnsFailureCode(): void
    {
        $command = new class extends OhDearCommand {
            protected function configure(): void
            {
                parent::configure();
                $this->setName('test:command');
            }

            protected function doExecute(InputInterface $input, OutputInterface $output): int
            {
                return Command::FAILURE;
            }
        };

        $tester = new CommandTester($command);
        $tester->execute([]);

        $this->assertSame(Command::FAILURE, $tester->getStatusCode());
    }

    public function testOhdearUuidOptionIsRegistered(): void
    {
        $command = new class extends OhDearCommand {
            protected function configure(): void
            {
                parent::configure();
                $this->setName('test:command');
            }

            protected function doExecute(InputInterface $input, OutputInterface $output): int
            {
                return Command::SUCCESS;
            }
        };

        $this->assertTrue($command->getDefinition()->hasOption('ohdear-uuid'));
    }

    public function testExceptionDuringExecuteWithUuidReturnsFailure(): void
    {
        $command = new class extends OhDearCommand {
            protected function configure(): void
            {
                parent::configure();
                $this->setName('test:command');
            }

            protected function doExecute(InputInterface $input, OutputInterface $output): int
            {
                throw new RuntimeException('something went wrong');
            }
        };

        $tester = new CommandTester($command);
        $tester->execute(['--ohdear-uuid' => 'test-uuid-that-does-not-exist']);

        $this->assertSame(Command::FAILURE, $tester->getStatusCode());
    }
}
