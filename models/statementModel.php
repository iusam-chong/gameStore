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

    public function OrderDetails($order)
    {
        $data = $this->listOrderId($order);

        $sql = 'SELECT od.order_id, p.id AS product_id, od.quantity, p.name, p.price FROM `order_details` AS od, `products` AS p WHERE p.id = od.product_id AND`order_id` IN (' . $data . ')';
        
        return $this->selectAll($sql);
    }

    public function listOrderId($order)
    {
        $query = "";
        foreach ($order as $arr) {
            $query .= $arr['id'] . ', ';
        }

        return rtrim($query, ', ');
    }

    public function getOrder($limit ,$offset)
    {
        $userId = $this->getUserId();

        $sql = 'SELECT * FROM `order` WHERE `user_id` = ? ORDER BY `id` DESC LIMIT ? OFFSET ?';
        $param = array($userId, $limit, $offset);

        return $this->selectAll($sql, $param);
    }

    public function countOrder()
    {   
        $userId = $this->getUserId();

        $sql = 'SELECT COUNT(`id`) as `count` FROM `order` WHERE `user_id` = ?';
        $param = array($userId);
        $result = $this->select($sql, $param);

        return $result['count'];
    }
}