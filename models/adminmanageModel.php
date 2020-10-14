<?php

class AdminManageModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT users.id, `user_name`, `type`, `enabled`, `employee` FROM `users`, `auth`, `manage_auth`
            WHERE auth.identifier = ? AND users.id = auth.user_id AND users.id = manage_auth.admin_id';
        $param = array($identifier);

        return $this->select($sql, $param);
    }

    public function getCurrentAuth()
    {
        $currentAdmin = $this->getUserData();
        $userId = $currentAdmin['id'];

        $sql = 'SELECT `product`, `member`, `employee` FROM `users`, `manage_auth` WHERE users.id = ? AND users.id = manage_auth.admin_id AND users.enabled = 1';
        $param = array($userId);

        return $this->select($sql, $param);
    }

    # For checking user name used or not
    public function checkUserExist($userName)
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
        $param = array($adminId);

        return $this->insert($sql, $param);
    }

    private function getNewAdmin()
    {
        $sql = 'SELECT * FROM `users` WHERE `type` = "admin" ORDER BY `id` DESC LIMIT 1';
        $result = $this->select($sql);

        return $result['id'];
    }

    public function showAllAdmin($limit, $offset)
    {
        $sql = 'SELECT users.*, m.product, m.member, m.employee FROM `users`, `manage_auth` as `m`
            WHERE `type` = "admin" AND users.id = m.admin_id LIMIT ? OFFSET ?';
        $param = array($limit, $offset);

        return $this->selectAll($sql, $param);
    }

    public function countAdmin()
    {
        $sql = 'SELECT COUNT(`id`) AS `count` FROM `users` WHERE `type` = "admin"';
        $result = $this->select($sql);

        return $result['count'];
    }

    public function modifyEnabledStatus($userId, $status)
    {
        $status = ($status) ? 0 : 1;

        $sql = 'UPDATE `users` SET `enabled` = ? WHERE `id` = ?';
        $param = array($status, $userId);

        return $this->insert($sql, $param);
    }

    public function setAllStatusDisable($userId)
    {
        $sql = 'UPDATE `manage_auth` SET `product` = 0, `member` = 0, `employee` = 0 WHERE `admin_id` = ?';
        $param = array($userId);

        return $this->insert($sql, $param);
    }

    public function setEnabledStatus($userId)
    {
        $sql = 'UPDATE `users` SET `enabled` = 1 WHERE `id` = ?';
        $param = array($userId);

        return $this->insert($sql, $param);
    }

    public function modifyProductStatus($userId, $status)
    {
        $status = ($status) ? 0 : 1;

        $sql = 'UPDATE `manage_auth` SET `product` = ? WHERE `admin_id` = ?';
        $param = array($status, $userId);

        return $this->insert($sql, $param);
    }

    public function modifyMemberStatus($userId, $status)
    {
        $status = ($status) ? 0 : 1;

        $sql = 'UPDATE `manage_auth` SET `member` = ? WHERE `admin_id` = ?';
        $param = array($status, $userId);

        return $this->insert($sql, $param);
    }

    public function modifyEmployeeStatus($userId, $status)
    {
        $status = ($status) ? 0 : 1;

        $sql = 'UPDATE `manage_auth` SET `employee` = ? WHERE `admin_id` = ?';
        $param = array($status, $userId);

        return $this->insert($sql, $param);
    }
}
