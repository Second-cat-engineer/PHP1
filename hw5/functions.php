<?php
function checkExistence($x) {
    if (!empty($x)){
        return $x;
    }
    return null;
}

function getUsersList() {
    return unserialize(file_get_contents(__DIR__ . '/users'));
}

function existsUser($login) {
    if (isset(getUsersList()[$login])) {
       return true;
    }
}

function checkPassword($login, $password) {
    if (existsUser($login)) {
        $hashPassword = getUsersList()[$login];
        if (password_verify($password, $hashPassword)){
            return true;
        }
    }
}

function getCurrentUser() {
    return $_SESSION['userName'] ?? null;
}

function showComments() {
    return file(__DIR__ . '/comments', FILE_IGNORE_NEW_LINES);
}

function showImages() {
    return scandir(__DIR__. '/gallery');
}

function infoUploadedImages(){ //Функция возвращает информацию о загруженных изображениях в виде массива ['имяФайла' => ['автор' => '', 'датаЗагрузки' => '']]
    return unserialize(file_get_contents(__DIR__ . '/infoAboutUploadedImages'));
}
