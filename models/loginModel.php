<?php

class LoginModel extends Model
{
    function __construct()
    {
        //echo "login modal loaded";
    }

    # Method login
    public function manualLogin($data)
    {
        # Check user if not exist then return FALSE
        $result = $this->getUser($data->userName);
        if (!$result) {
            return false;
        }

        # Check input password with password from db result, if not match return FALSE
        if (!password_verify($data->userPasswd, $result['password'])) {
            return false;
        }

        # Initial cookie method using by user id
        if (!Cookie::init($result['id'])) {
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
