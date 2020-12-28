<?php

namespace AppBundle\Controller\Todo;

use AppBundle\Application\Todo\Create\CreateTodoCommandHandler;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
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
            try {
                $handler->__invoke(
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