<?php
require_once __DIR__ . '/Article.php';

class News
{
    protected $pathToNews;
    protected $news;

    public function __construct()
    {
        $this->pathToNews = __DIR__ . '/../db/news';
        $this->news = $this->loadNews();
    }

    protected function loadNews()
    {
        $data = file($this->pathToNews, FILE_IGNORE_NEW_LINES);
        $news = [];
        foreach ($data as $value) {
            $article = unserialize($value);
            $news[] = new Article($article);
        }
        return $news;
    }

    public function getAllNews()
    {
        return $this->news;
    }

    public function addNewArticle(Article $article)
    {
        $news = $this->news;
        $news[] = $article;
        $this->news = $news;
    }

    public function saveArticle()
    {
        $news = [];
        foreach ($this->news as $article){
            $news[] = serialize($article->getArticle());
        }
        $file = implode("\n", $news);
        file_put_contents($this->pathToNews, $file);
    }
}