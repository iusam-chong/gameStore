<?php

class StatementModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT `user_name`, `type`, users.id FROM `users`, `auth` WHERE auth.identifier = ? AND users.id = auth.user_id';
        $param = array($identifier);
        $result = $this->select($sql, $param);

        return $result;
    }

    public function getUserId()
    {
        $user = $this->getUserData();

        return $user['id'];
    }

    public function getUserStatement()
    {
        $userId = $this->getUserId();

        $sql = 'SELECT o.*, od.product_id, p.name, od.quantity 
            FROM `order_details` AS od JOIN `order` AS o ON od.order_id = o.id 
            JOIN `products` AS p ON p.id = od.product_id WHERE o.user_id = ?';
        $param = array($userId);
        $result = $this->selectAll($sql, $param);

        return $result;
    }
}