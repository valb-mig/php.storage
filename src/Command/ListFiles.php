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
  name: 'list',
  description: 'List files',
  hidden: false,
  aliases: ['list']
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

      if(str_contains($dir, '..')) {
        throw new \Exception('Directory is not allowed');
      }

      $output->writeln("Listing files in '$dir' \n");
      $files = StorageService::list($dir);
      $output->writeln(print_r($files, true));
  
    } catch(\Exception $e) {
      $output->writeln($e->getMessage());
      return Command::FAILURE;
    }

    return Command::SUCCESS;
  }
}