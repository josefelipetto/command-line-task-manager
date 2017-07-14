<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class EditCommand extends Command{

	public function configure()
	{

		$this->setName('Edit')
			 ->setDescription('Edit a task')
			 ->addArgument('id',InputArgument::REQUIRED)
			 ->addArgument('description', InputArgument::REQUIRED)
			 ->addArgument('deadline'	, InputArgument::REQUIRED);
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{

		$id = $input->getArgument('id');

		$description = $input->getArgument('description');


		$deadline = $input->getArgument('deadline');


		$this->database->query('UPDATE tasks SET description = :description, deadline = :deadline', compact('description','deadline'));

		$output->writeln('<info> Task updated </info> ');

		$this->showTasks($output);
	}
}