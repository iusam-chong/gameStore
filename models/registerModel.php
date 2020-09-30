<?php

class RegisterModel extends Model
{
    public function __construct()
    {
        //echo "register modal loaded";
    }

    public function createUser($data)
    {
        # Check username if exist from db then return FALSE
        if ($this->getUser($data->userName)) {
            return false;
        }

        # Password Hash
        $hash = password_hash($data->userPasswd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`user_name`, `password`) VALUES (?, ?)";
        $param = array($data->userName, $hash);
        if (!$this->insert($sql, $param)) {
            return false;
        }

        return true;
    }

    # Get user from user name
    public function getUser($userName)
    {
        $sql = "SELECT * FROM `users` WHERE (`user_name` = ?)";
        $param = array($userName);
        $row = $this->select($sql, $param);

        return $row;
    }

}
