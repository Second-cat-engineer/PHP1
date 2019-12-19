<?php
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/News.php';
require_once __DIR__ . '/classes/View.php';

$users = new Users();
if (null === $users->getCurrentUser()) {
    echo 'Вы вошли как: Гость!';
} else {
    echo 'Вы вошли под Логином: ' . $users->getCurrentUser() . '!';
}

$news = new News();
$view = new View();

$view->assign('News', $news->getAllNews());
$view->assign('User', $users);
$view->display(__DIR__ . '/templates/news.php');
