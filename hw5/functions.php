<?php
function getUsersList(){ //Функция возвращает массив всех пользователей и хэшей их паролей
    return unserialize(file_get_contents(__DIR__ . '/users')); //получи содержимое файла users в виде массива
}

function existsUser($login){ //проверяет - существует ли пользаватель с заданным логином
    if (array_key_exists($login, getUsersList())){
       return true;
    }
}

function checkPassword($login, $password){ //возвращает true когда пользователь с указанным логином существует и введенный им пароль прошел проверку
    if (existsUser($login)){
        $hashPassword = getUsersList()[$login]; //возьми из массива пользователей хэш пароля данного пользователя и присвой ему имя hashPassword
        if (password_verify($password, $hashPassword)){ //если хэш введенного пароля совпадает с сохраненным хэшем
            return true;
        }
    }
}

function getCurrentUser(){ // Функция возвращает либо имя вошедшего на сайт пользователя, либо null
    $sessionId = $_COOKIE['sessionId'] ?? null; // если от пользователя пришла какая то кука в $_COOKIE, присвой ему имя $sessionId

    $sessions = getUsersSessions(); //массив текущих сессий в виде логин=>идентификаторСессии
    if (in_array($sessionId, $sessions)) { // проверь существование полученной куки в массиве
        return array_search($sessionId, $sessions); // верни индекс текущего элемента массива.
    } else {
        return null;
    }
}


function getUsersSessions(){ //функция возвращает массив сохраненных сессий в виде логин=>идентификаторСессии
    return unserialize(file_get_contents(__DIR__ . '/session'));
}

function saveUserSession ($login, $sessionId) { //сохраняет текущую сессию пользователя
    $sessions = getUsersSessions();
    $sessions[$login] = $sessionId; // в массив saveUserSession добавь элемент: $login => $sessionId
                                       // в случае когда пользователь будет заходить на сайт второй раз, то sessionId просто перезапишется
    $line = serialize($sessions); // Преобразуй этот массив в строку (в сериализованный массив) для записи в файл
    file_put_contents(__DIR__ . '/session', $line); // Запиши сериализованный массив в файл
}

function showComments (){ // возвращает записи гостевой книги в виде массива
    return file(__DIR__ . '/comments', FILE_IGNORE_NEW_LINES);
}

function showImages(){ // Возвращает изображения в папке Галлерея в виде массива их названий
    return scandir(__DIR__. '/gallery');
}

function infoUploadedImages(){ //Функция возвращает информацию о загруженных изображениях в виде массива ['имяФайла' => ['автор' => '', 'датаЗагрузки' => '']]
    return unserialize(file_get_contents(__DIR__ . '/infoAboutUploadedImages'));
}




