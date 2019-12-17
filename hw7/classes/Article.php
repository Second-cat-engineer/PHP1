<?php


class Article
{
    protected $article;
    protected $title;
    protected $body;
    protected $author;
    protected $date;

    public function __construct($article)
    {
        $this->article = $article;
        $this->title = $article['title'];
        $this->body = $article['body'];
        $this->author = $article['author'];
        $this->date = $article['date'];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getArticle()
    {
        return $this->article;
    }
}