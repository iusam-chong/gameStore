<?php

class MemberStatementModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT users.id, `user_name`, `type`, `enabled`, `member` FROM `users`, `auth`, `manage_auth` 
            WHERE auth.identifier = ? AND users.id = auth.user_id AND users.id = manage_auth.admin_id';
        $param = array($identifier);

        return $this->select($sql, $param);
    }

    public function findMember($id)
    {
        $sql = 'SELECT * FROM `users` WHERE `type` = "user" AND `id` = ?';
        //$sql = 'SELECT * FROM `users` WHERE `id` = ?';
        $param = array($id);

        return $this->select($sql, $param);
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

    public function getOrder($limit ,$offset, $memberId)
    {
        $sql = 'SELECT * FROM `order` WHERE `user_id` = ? ORDER BY `id` DESC LIMIT ? OFFSET ?';
        $param = array($memberId, $limit, $offset);

        return $this->selectAll($sql, $param);
    }

    public function countOrder($memberId)
    {   
        $sql = 'SELECT COUNT(`id`) as `count` FROM `order` WHERE `user_id` = ?';
        $param = array($memberId);
        $result = $this->select($sql, $param);

        return $result['count'];
    }
}