<?php

namespace AppBundle\Controller\Todo;

use AppBundle\Application\Todo\Create\CreateTodoCommandHandler;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TodoPostController extends Controller
{
    /**
     * @Route("/todo", name="todo_post")
     */
    public function __invoke(Request $request, CreateTodoCommandHandler $handler)
    {
        if ($request->isMethod('POST')) {
            $handler->__invoke(
                $request->request->get('id'),
                $request->request->get('name'),
                $request->request->get('dueDate')
            );
        }
        return $this->render('todo/form.html.twig', [
            'next_todo_id' => Uuid::uuid4()->toString()
        ]);
    }

}