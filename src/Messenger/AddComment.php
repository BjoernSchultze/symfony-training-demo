<?php

namespace App\Messenger;

class AddComment
{
    public function __construct(
        private readonly string $comment,
        private readonly string $author
    ) {
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}