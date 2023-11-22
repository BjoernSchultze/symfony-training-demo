<?php

namespace App\Messenger;

use App\Entity\Comment;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class AddCommentHandler
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository,
        private PostRepository $postRepository
    ) {
    }

    public function __invoke(AddComment $addComment): void
    {
        $comment = new Comment();
        $comment->setContent($addComment->getComment());
        $comment->setAuthor($this->userRepository->find(1));
        $comment->setPost($this->postRepository->find(1));
        sleep(10);

        $this->entityManager->persist($comment);
        $this->entityManager->flush();
    }
}