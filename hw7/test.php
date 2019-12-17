<?php
require_once __DIR__ . '/classes/News.php';
require_once __DIR__ . '/classes/Article.php';
require_once __DIR__ . '/classes/View.php';

$news = new News;
$view = new View();

$view->assign('news', $news->getAllNews());
$view->display(__DIR__ . '/templates/news.php');

/*
foreach ($news->getAllNews() as $article) {
    echo $article->getTitle() . '<br>';
    echo $article->getBody() . '<br>';
    echo $article->getAuthor() . '<br>';
    echo $article->getDate() . '<br>';
}
*/
/*
$article3 = [
    'title' => 'news',
    'body' => 'This is news',
    'author' => 'Safuan',
    'date' => '17.12.2019'
];

$article = new Article($article3);
$news->addNewArticle($article);
$news->saveArticle();
*/

/*
$article1 = [
    'title' => 'news',
    'body' => 'This is news',
    'author' => 'Safuan',
    'date' => '17.12.2019'
];
$article2 = [
    'title' => 'news',
    'body' => 'This is news',
    'author' => 'Safuan',
    'date' => '17.12.2019'
];

$art1 = serialize($article1);
$art2 = serialize($article2);
$news = [];
$news[] = $art1;
$news[] = $art2;
$file = implode("\n", $news);
file_put_contents(__DIR__ . '/db/news', $file);
*/