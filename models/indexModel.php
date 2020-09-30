<?php

class IndexModel extends Model
{
    public function __construct()
    {

    }

    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT `user_name` FROM `users`, `auth` WHERE auth.identifier = ? AND users.id = auth.user_id';
        $param = array($identifier);
        $result = $this->select($sql, $param);

        return $result;
    }
}
