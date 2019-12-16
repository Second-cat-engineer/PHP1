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
    return isset(getUsersList()[$login]);
}

function checkPassword($login, $password) {
    if (existsUser($login)) {
        $hashPassword = getUsersList()[$login];
        return password_verify($password, $hashPassword);
    }
}

function getCurrentUser() {
    return $_SESSION['userName'] ?? null;
}