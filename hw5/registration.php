<?php
    include __DIR__ . '/functions.php';
    // Проверка корректности Логина и пароля
    if ((!empty ($_POST ['login']) &&  !empty($_POST ['password'])) === true) {
        $login = $_POST ['login']; // значению login даем имя $login
        $password = $_POST ['password'];
    } elseif (!empty ($_POST ['login']  || ($_POST ['password']) == false)) {
        $error = 'Вы заполнили не все поля!';
        $back = '<a href = "/hw5/registrationForm.php"> Ввести заново </a>';
        echo  $error . $back;
        die;
    }

    $users = getUsersList(); //получи список всех пользователей и хэшей их паролей в виде массива
    if (existsUser($login)){ //Проверка на существование пользователя с указанным логином
        echo 'Пользователь с таким Логином уже зарегистрирован!';
        ?> <a href = "/hw5/registrationForm.php"> Ввести заново </a> <?php
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Хешируем полученный пароль, и запиываем значение в переменную $password
        $users[$login] = $passwordHash; // Добавил в массив $users элемент с ключом $login и значением $password
        $line = serialize($users); // Преобразуй массив в строку для записи в файл
        file_put_contents(__DIR__ . '/users', $line); //Запиши в файл users.txt
        header('Location: /hw5/login.php'); // редирект на страницу входа
    }

