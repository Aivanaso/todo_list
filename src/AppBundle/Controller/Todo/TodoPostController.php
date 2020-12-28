<?php

namespace AppBundle\Controller\Todo;

use AppBundle\Application\Todo\Create\CreateTodoCommandHandler;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TodoPostController extends Controller
{
    private $handler;

    public function __construct(CreateTodoCommandHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @Route("/todo", name="todo_post")
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            try {
                $this->handler->__invoke(
                    $request->request->get('id'),
                    $request->request->get('name'),
                    $request->request->get('dueDate')
                );
                $this->addFlash('success', 'Tarea creada!');
            } catch (UniqueConstraintViolationException $error) {
                $this->addFlash('errors', 'La tarea ya existe');
            }

        }
        return $this->redirectToRoute('homepage');
    }

}