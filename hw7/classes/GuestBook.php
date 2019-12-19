<?php
require_once __DIR__ . '/GuestBookRecord.php';

class GuestBook
{
    protected $pathToGuestBook;
    protected $guestBook;

    public function __construct()
    {
        $this->pathToGuestBook = __DIR__ . '/../db/comments';
        $data = file ($this->pathToGuestBook, FILE_IGNORE_NEW_LINES);
        $guestBook = [];
        foreach ($data as $datum) {
            $comment = unserialize($datum);
            $guestBook[] = new GuestBookRecord($comment);
        }
        $this->guestBook = $guestBook;
    }

    public function getAllComments()
    {
        return $this->guestBook;
    }

    public function addNewComment($comment)
    {
        $this->guestBook[] = $comment;
    }

    public function saveNewComment()
    {
        $comments = [];
        foreach ($this->guestBook as $comment) {
            $comment = [
                'comment' => $comment->getComment(),
                'author' => $comment->getAuthor(),
                'date' => $comment->getDate()
                ];
            $comments[] = serialize($comment);
       }
        $file = implode("\n", $comments);
        file_put_contents($this->pathToGuestBook, $file);
    }
}