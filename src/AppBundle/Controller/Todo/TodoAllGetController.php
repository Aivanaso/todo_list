<?php


namespace AppBundle\Controller\Todo;


use AppBundle\Application\Todo\SearchAll\SearchAllTodoCommandHandler;
use AppBundle\Application\Todo\TodoResponse;
use AppBundle\Application\Todo\TodoResponses;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TodoAllGetController extends Controller
{
    private $handler;

    public function __construct(SearchAllTodoCommandHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /** @var TodoResponses $todoLists */
        $todoLists     = $this->handler->__invoke();
        $todoListArray = [];
        foreach ($todoLists->todolist() as $todo) {
            $todoListArray[] = $this->toArray($todo);
        }
        return $this->render(
            'todo/index.html.twig', [
                                      'base_dir'     => realpath(
                                              $this->getParameter('kernel.project_dir')
                                          ) . DIRECTORY_SEPARATOR,
                                      'next_todo_id' => Uuid::uuid4()->toString(),
                                      'todoLists' => $todoListArray
                                  ]
        );
    }

    private function toArray(TodoResponse $todo): array
    {
        return [
            'id' => $todo->getId(),
            'name' => $todo->getName(),
            'creationDate' => $todo->getCreationDate(),
            'dueDate' => $todo->getDueDate(),
            'status' => $todo->isStatus()
        ];
    }
}
