<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteCommand extends Command{

	public function configure()
	{

		$this->setName('Complete')
			 ->setDescription('Delete given task')
			 ->addArgument('id', InputArgument::REQUIRED);
	}


	public function execute(InputInterface $input, OutputInterface $output)
	{

		$id = $input->getArgument('id');

		$this->database->query('delete from tasks where id = :id', compact('id'));

		$output->writeln('<info> Task Completed </info>');

		$this->showTasks($output);
	}
}