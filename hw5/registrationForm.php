<?php
require_once __DIR__ . '/functions.php';
session_start();
if (!null == getCurrentUser()){
    header('Location: /hw5/guestBook.php');
}
?>
<h1> Страница регистрации </h1>
<form action = "/hw5/registration.php" method = "post">
    <p> введите Логин:
        <input type = "text" name = "login">
    </p>
    <p> введите Пароль:
        <input type = "password" name = "password">
    </p>
    <p>
        <button type="submit"> Зарегистрироваться </button>
    </p>
</form>