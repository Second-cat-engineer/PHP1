<?php
require_once __DIR__ . '/functions.php';
session_start();

if (null === getCurrentUser()){
    $login = checkExistence($_POST['login']);
    $password = checkExistence($_POST['password']);
    if (checkPassword($login, $password)) {
        $_SESSION['userName'] = $login;
        header ('Location: /hw6/guestBook.php');
        exit();
    }
} else {
    header('Location: /hw6/guestBook.php');
    exit();
}
?>
<h1> Страница авторизации</h1>
<form action="/hw6/login.php" method="post">
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
    <a href="/hw6/registrationForm.php"> Регистрация </a>
</p>




