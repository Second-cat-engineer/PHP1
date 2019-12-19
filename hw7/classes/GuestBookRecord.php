<?php

class GuestBookRecord
{
    protected $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function getComment()
    {
        return $this->comment['comment'];
    }

    public function getAuthor()
    {
        return $this->comment['author'];
    }

    public function getDate()
    {
        return $this->comment['date'];
    }
}