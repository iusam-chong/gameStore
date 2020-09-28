<?php

class loginModel extends Model
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
        if (!password_verify($data->userPasswd, $result['user_passwd'])) {
            return false;
        }

        # Call session register method
        //$this->registerLoginSession($result['user_id']);

        return true;
    }

    public function getUser($userName) 
    {    
        $sql = "SELECT * FROM users WHERE (`user_name` = ?)";
        $param = array($userName);
        $row = $this->select($sql, $param);
        
        return $row;
    }

    public function testMethod() {
        echo "hello world";
    }
}
