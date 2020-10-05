<?php

class ProductManageModel extends Model
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

    public function insertProduct($product)
    {
        $sql = 'INSERT INTO `products` (`name`, `price`, `quantity`, `description`, `image`) VALUE (?, ?, ?, ?, ?)';
        $param = array($product->name, $product->price, $product->quantity, $product->description, $product->image);
        $result = $this->insert($sql, $param);

        return $result;
    }

    public function getProducts()
    {
        $sql = 'SELECT * FROM `products`';
        $result = $this->selectAll($sql);

        return $result;
    }
}