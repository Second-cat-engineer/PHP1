<?php
require_once __DIR__ . '/classes/DB.php';
require_once __DIR__ . '/classes/View.php';

//var_dump($_GET);

if (empty($_GET['id'])) {
    header('Location: /hw8/news.php');
    exit();
}

$news = new DB();
$news->execute('SELECT * FROM news');
$data = $news->query('SELECT * FROM news WHERE id=:id', $_GET);

if (empty($data)) {
    header('Location: /hw8/news.php');
    exit();
}

$view = new View();
$view->assign('Article', $data);
$view->display(__DIR__ . '/templates/article.php');
