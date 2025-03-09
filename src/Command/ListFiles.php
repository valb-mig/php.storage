<?php

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
  name: 'storage:list',
  description: 'List files',
  hidden: false,
  aliases: ['storage:list']
)]
class ListFiles extends Command
{
  protected function configure(): void
  {
    $this
        ->addArgument('dir', InputArgument::REQUIRED, 'Directory');
  }

  public function execute(InputInterface $input, OutputInterface $output): int
  {
    try {
      $dir = $input->getArgument('dir');

      $output->writeln("Listing files in '$dir'");
  
      $files = StorageService::list($dir);
  
      $output->writeln(print_r($files));
  
    } catch(\Exception $e) {
      $output->writeln($e->getMessage());
      return Command::FAILURE;
    }

    return Command::SUCCESS;
  }
}