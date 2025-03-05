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

use App\Service\FileService;

#[AsCommand(
  name: 'list',
  description: 'List files',
  hidden: false,
  aliases: ['-l']
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
    $dir = $input->getArgument('dir');

    $output->writeln("Listing files in $dir");

    $fileService = new FileService();

    $files = $fileService->list($dir);

    dd($files);

    $output->writeln("");
    return Command::SUCCESS;
  }
}