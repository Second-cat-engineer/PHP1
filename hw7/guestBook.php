<?php
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/GuestBook.php';
require_once __DIR__ . '/classes/View.php';

$users = new Users();
if (null === $users->getCurrentUser()) {
    echo 'Вы вошли как: Гость!';
} else {
    echo 'Вы вошли под Логином: ' . $users->getCurrentUser() . '!';
}

$gustBook = new GuestBook();
$view = new View();

$view->assign('GuestBook', $gustBook->getAllComments());
$view->assign('User', $users);
$view->display(__DIR__ . '/templates/guestBook.php');
