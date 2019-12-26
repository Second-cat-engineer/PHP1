<?php
require_once __DIR__ . '/classes/DB.php';
require_once __DIR__ . '/classes/View.php';

if (empty($_GET['id'])) {
    header('Location: /hw8/news.php');
    exit();
}
$idArticle[':id'] = $_GET['id'];

$news = new DB();
$data = $news->query('SELECT * FROM news WHERE id=:id', $idArticle);

if ((false === $data) || empty($data)) {
    header('Location: /hw8/news.php');
    exit();
}

$view = new View();
$view->assign('Article', $data);
$view->display(__DIR__ . '/templates/article.php');
