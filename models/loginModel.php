<?php

class LoginModel extends Model
{
    public function getUser($userName)
    {
        $sql = "SELECT * FROM `users` WHERE (`user_name` = ?)";
        $param = array($userName);

        return $this->select($sql, $param);
    }

    public function verifyLogin($loginData)
    {
        $result = $this->getUser($loginData->userName);
        if (!$result) {
            return false;
        }

        if (!password_verify($loginData->userPasswd, $result['password'])) {
            return false;
        }
        return $result;
    }

    public function checkEnable($user)
    {
        $sql = "SELECT * FROM `users` WHERE `enabled` = 1 AND (`id` = ?)";
        $param = array($user['id']);

        return $this->select($sql, $param);
    }

    public function initCookieLogin($user)
    {
        # Login with cookie, check it in CookieClass in lib folder
        return (Cookie::init($user['id'])) ? true : false;
    }
}
