<?php
session_start();
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/News.php';
require_once __DIR__ . '/classes/Article.php';

$users = new Users();
if (empty($_POST['title'] || $_POST['text'])) {
    header('Location: /hw7/offerArticle.php');
    exit();
} else {
    $article = [];
    $article['title'] = $_POST['title'];
    $article['text'] = $_POST['text'];
    $article['author'] = $users->getCurrentUser();
    $article['date'] = time();
}

$article = new Article($article);
$news = new News();
$news->getAllNews();
$news->addNewArticle($article);
$news->saveNewArticle();
header('Location: /hw7/news.php');