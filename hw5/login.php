<?php
include __DIR__ . '/functions.php';

if (!null == getCurrentUser()){
    header('Location: /hw5/guestBook.php');
} else {
    $login = $_POST ['login'] ?? null; //если в POST есть значение с ключем login, то присвой этому значению имя $login, иначе null
    $password = $_POST ['password'] ?? null;

    if (checkPassword($login, $password)) { // если пользователь авторизовался
        $sessionId = hash('sha256', microtime()); // генерируй ему хэш
        setcookie('sessionId', $sessionId); //установи сгенерированный хэш в виде куки
        saveUserSession($login, $sessionId); // запиши в файл Логин пользователя и установленную куку
        header ('Location: /hw5/guestBook.php'); //перенаправь на страницу Гостевой книги
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




