<?php


class Article
{
    protected $title;
    protected $text;
    protected $author;
    protected $date;

    public function __construct(array $article)
    {
        $this->title = $article['title'];
        $this->text = $article['text'];
        $this->author = $article['author'];
        $this->date = $article['date'];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getText()
    {
        return $this->text;
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