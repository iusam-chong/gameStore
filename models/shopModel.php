<?php

class ShopModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT users.id as `id`, `user_name`,`type` FROM `users`, `auth` WHERE auth.identifier = ? AND users.id = auth.user_id';
        $param = array($identifier);

        return $this->select($sql, $param);
    }

    public function getProducts($limit ,$offset)
    {
        $sql = 'SELECT * FROM `products` WHERE `enabled` = 1 ORDER BY `id` DESC LIMIT ? OFFSET ?';
        $param = array($limit, $offset);

        return $this->selectAll($sql, $param);
    }

    public function countProducts()
    {
        $sql = 'SELECT COUNT(`id`) as `count` FROM `products` WHERE `enabled` = 1';
        $result = $this->select($sql);

        return $result['count'];
    }

    public function userCartItem()
    {
        $userId = $this->getUserId();

        $sql = 'SELECT `product_id` FROM `carts` WHERE `user_id` = ?';
        $param = array($userId);

        return $this->selectAll($sql, $param);
    }

    public function getUserId()
    {
        $user = $this->getUserData();

        return $user['id'];
    }
}