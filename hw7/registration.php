<?php
session_start();
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/classes/View.php';
require_once __DIR__ . '/classes/Users.php';
$users = new Users();

if (null === $users->getCurrentUser()) {
    if (!empty($_POST)) {
        $login = checkExistence($_POST['login']);
        $password = checkExistence($_POST['password']);
        if (!$users->existsUser($login)){
            $users->saveNewUser($login, $password);
            header('Location: /hw7/index.php');
            exit();
        }
    }
} else {
    header('Location: /hw7/index.php');
    exit();
}

$view = new View();
$view->display(__DIR__ . '/templates/registrationForm.php');