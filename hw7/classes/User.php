<?php


class User
{
    protected $userLogin;
    protected $userPassword;
    
    public function __construct($user)
    {
        $this->userLogin = $user['login'];
        $this->userPassword = $user['password'];
    }
    
    public function getUserLogin()
    {
        return $this->userLogin;
    }
    
    public function getUserPassword()
    {
        return $this->userPassword;
    }

}