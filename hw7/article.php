<?php
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/News.php';
require_once __DIR__ . '/classes/Article.php';
require_once __DIR__ . '/classes/View.php';

if (!isset($_GET['id'])) {
    header('Location: /hw7/news.php');
    exit();
}
$id = $_GET['id'];

$users = new Users();
if (null === $users->getCurrentUser()) {
    echo 'Вы вошли как: Гость!';
} else {
    echo 'Вы вошли под Логином: ' . $users->getCurrentUser() . '!';
}

$news = new News();
$article = $news->getAllNews()[$id];

$view = new View();
$view->assign('Article', $article);
$view->assign('User', $users);
$view->display(__DIR__ . '/templates/article.php');
