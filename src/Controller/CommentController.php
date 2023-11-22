<?php

namespace App\Controller;

use App\Messenger\AddComment;
use App\Messenger\AddCommentTwo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CommentController extends AbstractController
{
    #[Route('/api/comment/add', name: 'comment_add', methods: ['GET', 'POST'])]
    public function create(Request $request, ValidatorInterface $validator, EntityManagerInterface $entityManager, MessageBusInterface $messageBus): Response
    {
        $message = new AddComment('Hello world', 'Ryan');
        $messageBus->dispatch($message);

        return new Response('Works!', Response::HTTP_CREATED);
    }
}
