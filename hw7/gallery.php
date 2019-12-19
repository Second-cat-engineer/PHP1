<?php
session_start();
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/Gallery.php';
require_once __DIR__ . '/classes/Image.php';
require_once __DIR__ . '/classes/View.php';

$users = new Users();
if (null === $users->getCurrentUser()) {
    echo 'Вы вошли как: Гость!';
} else {
    echo 'Вы вошли под Логином: ' . $users->getCurrentUser() . '!';
}

$gallery = new Gallery();
$view = new View();

$view->assign('Gallery', $gallery->getGallery());
$view->assign('User', $users);
$view->display(__DIR__ . '/templates/gallery.php');