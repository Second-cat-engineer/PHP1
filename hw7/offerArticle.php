<?php
session_start();
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/View.php';

$users = new Users();
if (null === $users->getCurrentUser()) {
    echo 'Вы вошли как: Гость!';
} else{
    echo 'Вы вошли под логином: ' . $users->getCurrentUser() . ' !';
}

$view = new View();
$view->display(__DIR__ . '/templates/offerArticleForm.php');