<?php
require_once __DIR__ . '/Users.php';

class Users
{
    protected $pathToUsers;
    protected $users;

    public function __construct()
    {
        $this->pathToUsers = __DIR__ . '/../db/users';
        $this->users = unserialize(file_get_contents($this->pathToUsers));
    }

    public function getUserList()
    {
        return $this->users;
    }

    public function existsUser($login)
    {
        return isset($this->users[$login]);
    }

    public function checkPassword($login, $password)
    {
        if ($this->existsUser($login)) {
            $hashPassword = $this->users[$login];
            return password_verify($password, $hashPassword);
        }
    }

    public function getCurrentUser()
    {
        return $_SESSION['userName'] ?? null;
    }

    public function saveNewUser($login, $password)
    {
        $users = $this->users;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $users[$login] = $passwordHash;
        $line = serialize($users);
        file_put_contents($this->pathToUsers, $line);
        $_SESSION['userName'] = $login;
        header('Location: /hw7/index.php');
    }
}