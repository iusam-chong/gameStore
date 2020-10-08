<?php

class MemberManageModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT `user_name`,`type` FROM `users`, `auth` WHERE auth.identifier = ? AND users.id = auth.user_id';
        $param = array($identifier);

        return $this->select($sql, $param);
    }

    public function showAllMember()
    {
        $sql = 'SELECT * FROM `users` WHERE `type` = "user"';
        
        return $this->selectAll($sql);
    }

    public function userExist($userId)
    {
        $sql = 'SELECT * FROM `users` WHERE (`id` = ?)';
        $param = array($userId);

        return $this->select($sql, $param);
    }

    public function setStatus($userId, $status)
    {
        $status = ($status) ? 0 : 1; 

        $sql = 'UPDATE `users` SET `enabled` = ? WHERE `id` = ?';
        $param = array($status, $userId);

        return $this->insert($sql, $param);
    }
}