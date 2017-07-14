<?php

namespace App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command{
	

	public function configure()
	{

		$this->setName('add')
			 ->setDescription('Add a new task')
			 ->addArgument('description', InputArgument::REQUIRED)
			 ->addArgument('deadline', InputArgument::OPTIONAL);
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{

			$description = $input->getArgument('description');
			if(! $deadline    = $input->getArgument('deadline'))
				$deadline = date("Y-m-d H:i:s");


			$this->database->query('INSERT INTO tasks(description,deadline) values(:description,:deadline) ', compact('description','deadline'));

			$output->writeln("<info> Task added! </info>");

			$this->showTasks($output);

	}


}