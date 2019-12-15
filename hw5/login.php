<?php
require_once __DIR__ . '/functions.php';
session_start();

if (!null == getCurrentUser()){
    header('Location: /hw5/guestBook.php');
    exit();
} else {
    $login = checkExistence($_POST ['login']);
    $password = checkExistence($_POST ['password']);
    if (checkPassword($login, $password)) {
        $_SESSION['userName'] = $login;
        header ('Location: /hw5/guestBook.php');
        exit();
    }
}
?>
<h1> Страница авторизации</h1>
<form action="/hw5/login.php" method="post">
    <p> введите Логин:
        <input type="text" name="login">
    </p>
    <p> введите Пароль:
        <input type="text" name="password">
    </p>
    <p>
        <button type="submit"> войти</button>
    </p>
</form>
<p>
    <a href="/hw5/registrationForm.php"> Регистрация </a>
</p>




