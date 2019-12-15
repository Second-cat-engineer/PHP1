<?php
require_once __DIR__ . '/functions.php';
session_start();

if (empty($_POST['login'] || $_POST['password'])){
    header('Location: /hw5/registrationForm.php');
} else {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (existsUser($login)){
        header('Location: /hw5/registrationForm.php');
    } else {
        $users = getUsersList();
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $users[$login] = $passwordHash;
        $line = serialize($users);
        file_put_contents(__DIR__ . '/users', $line);
        $_SESSION['userName'] = $login;
        header('Location: /hw5/guestBook.php');
    }
}