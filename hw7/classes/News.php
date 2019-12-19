<?php
require_once __DIR__ . '/Article.php';

class News
{
    protected $pathToNews;
    protected $news;

    public function __construct()
    {
        $this->pathToNews = __DIR__ . '/../db/news';
        $data = file($this->pathToNews, FILE_IGNORE_NEW_LINES);
        $news = [];
        foreach ($data as $datum) {
            $article = unserialize($datum);
            $news[] = new Article($article);
        }
        $this->news = $news;
    }

    public function getAllNews()
    {
        return $this->news;
    }

    public function addNewArticle(Article $article)
    {
        $this->news[] = $article;
    }

    public function saveNewArticle()
    {
        $news = [];
        foreach ($this->news as $article){
            $article = [
                'title' => $article->getTitle(),
                'text' => $article->getText(),
                'author' => $article->getAuthor(),
                'date' => $article->getDate(),
            ];
            $news[] = serialize($article);
        }
        $file = implode("\n", $news);
        file_put_contents($this->pathToNews, $file);
    }
}