<?php

class MemberManageModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT users.id, `user_name`, `type`, `enabled`, `member` FROM `users`, `auth`, `manage_auth` 
            WHERE auth.identifier = ? AND users.id = auth.user_id AND users.id = manage_auth.admin_id';
        $param = array($identifier);

        return $this->select($sql, $param);
    }

    public function showAllMember($limit, $offset)
    {
        $sql = 'SELECT * FROM `users` WHERE `type` = "user" LIMIT ? OFFSET ?';
        $param = array($limit, $offset);

        return $this->selectAll($sql, $param);
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

    public function countMember()
    {
        $sql = 'SELECT COUNT(`id`) AS `count` FROM `users` WHERE `type` = "user"';
        $result = $this->select($sql);

        return $result['count'];
    }
}