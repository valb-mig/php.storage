<?php
declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\{
  Command\Command,
  Attribute\AsCommand
};
use Symfony\Component\Console\Input\{
  InputArgument,
  InputInterface
};
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\StorageService;

#[AsCommand(
  name: 'remove',
  description: 'Remove files',
  hidden: false,
  aliases: ['remove']
)]
class RemoveFile extends Command
{
  protected function configure(): void
  {
    $this
        ->addArgument('filepath', InputArgument::REQUIRED, 'File path');
  }

  public function execute(InputInterface $input, OutputInterface $output): int
  {
    try {
      $filePath = $input->getArgument('filepath');
      StorageService::remove($filePath);
      $output->writeln("File '$filePath' removed");
  
    } catch(\Exception $e) {
      $output->writeln($e->getMessage());
      return Command::FAILURE;
    }

    return Command::SUCCESS;
  }
}