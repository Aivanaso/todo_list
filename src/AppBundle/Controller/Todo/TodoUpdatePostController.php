<?php


namespace AppBundle\Controller\Todo;


use AppBundle\Application\Todo\Update\UpdateTodoCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoUpdatePostController extends Controller
{
    private $updater;

    public function __construct(UpdateTodoCommandHandler $updater)
    {
        $this->updater = $updater;
    }

    /**
     * @Route("/todo/{id}", name="todo_put")
     */
    public function __invoke(string $id, Request $request)
    {
        ($this->updater)(
            $id,
            $request->request->get('name'),
            $request->request->get('dueDate'),
            $request->request->getBoolean('status')
        );

        return new Response();
    }
}