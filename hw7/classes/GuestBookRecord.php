<?php

class GuestBookRecord
{
    protected $comment;
    protected $author;
    protected $date;

    public function __construct(array $comment)
    {
        $this->comment = $comment['comment'];
        $this->author = $comment['author'];
        $this->date = $comment['date'];
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getDate()
    {
        return $this->date;
    }
}