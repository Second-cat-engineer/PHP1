<?php
require_once __DIR__ . '/classes/DB.php';
require_once __DIR__ . '/classes/View.php';

$news = new DB();
$data = $news->query('SELECT * FROM news ORDER BY date');

$view = new View();
$view->assign('News', $data);
$view->display(__DIR__ . '/templates/news.php');
