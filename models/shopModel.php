<?php

class ShopModel extends Model
{
    public function __construct()
    {

    }

    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT `user_name`,`type` FROM `users`, `auth` WHERE auth.identifier = ? AND users.id = auth.user_id';
        $param = array($identifier);
        $result = $this->select($sql, $param);

        return $result;
    }

    public function getProducts()
    {
        $sql = 'SELECT * FROM `products` WHERE `enabled` = 1 ORDER BY `id` DESC';
        $result = $this->selectAll($sql);

        return ($result) ? $result : false;
    }
}