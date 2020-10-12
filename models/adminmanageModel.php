<?php

class AdminManageModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT `user_name`,`type` FROM `users`, `auth` WHERE auth.identifier = ? AND users.id = auth.user_id';
        $param = array($identifier);

        return $this->select($sql, $param);
    }

    # For checking user name used or not
    public function getUser($userName)
    {
        $sql = 'SELECT `id` FROM `users` WHERE (`user_name` = ?)';
        $param = array($userName);

        return $this->select($sql, $param);
    }

    public function createAdmin($data)
    {
        $hash = password_hash($data->userPasswd, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO `users` (`user_name`, `password`, `type`) VALUES (?, ?, "admin")';
        $param = array($data->userName, $hash);
        
        return $this->insert($sql, $param);
    }

    public function defaultAuth()
    {
        $adminId = $this->getNewAdmin();

        $sql = 'INSERT INTO `manage_auth` (`admin_id`) VALUE (?)';
        $param  = array($adminId);

        return $this->insert($sql, $param);
    }

    private function getNewAdmin()
    {
        $sql = 'SELECT * FROM `users` WHERE `type` = "admin" ORDER BY `id` DESC LIMIT 1';
        $result = $this->select($sql);

        return $result['id'];
    }

    public function showAllAdmin()
    {
        $sql = 'SELECT users.*, m.product, m.member, m.employee FROM `users`, `manage_auth` as `m` 
            WHERE `type` = "admin" AND users.id = m.admin_id';

        return $this->selectAll($sql);
    }
}
