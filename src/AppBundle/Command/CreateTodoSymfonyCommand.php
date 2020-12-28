<?php

namespace AppBundle\Command;

use AppBundle\Application\Todo\Create\CreateTodoCommandHandler;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTodoSymfonyCommand extends Command
{
    protected static $defaultName = 'app:create-todo';
    private $handler;

    public function __construct(CreateTodoCommandHandler $handler)
    {
        parent::__construct();
        $this->handler = $handler;
    }

    protected function configure()
    {
        $this->setDescription('Creates a new todo list')
            ->addArgument('name', InputArgument::REQUIRED, 'Name of the task')
            ->addArgument('dueDate', InputArgument::REQUIRED, 'Due date to do task');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $id = Uuid::uuid4()->toString();
        $name = $input->getArgument('name');
        $dueDate = $input->getArgument('dueDate');
        try {
            ($this->handler)($id, $name, $dueDate);
            $output->writeln('Task created successfully');
            return 0;
        } catch (\InvalidArgumentException $error) {
            return 1;
        }
    }
}