<?php

class ProductManageModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT users.id, `user_name`, `type`, `enabled`, `product` FROM `users`, `auth`, `manage_auth` 
            WHERE auth.identifier = ? AND users.id = auth.user_id AND users.id = manage_auth.admin_id';
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

    public function modifyProduct($product)
    {
        $sql = 'UPDATE `products` SET `name` = ?, `price` = ?, `quantity` = ?, `description` = ? WHERE `id` = ?';
        $param = array($product->name, $product->price, $product->quantity, $product->description, $product->id);
        $result = $this->insert($sql, $param);

        if (!$result) {
            return false;
        }

        if ($product->image === null) {
            return true;
        } else {
            return $this->modifyProdImg($product);
        }
    }

    public function modifyProdImg($product)
    {
        $sql = 'UPDATE `products` SET `image` = ? WHERE `id` = ?';
        $param = array($product->image, $product->id);
        $result = $this->insert($sql, $param);

        return $result;
    }

    public function disableProduct($id)
    {
        $sql = 'UPDATE `products` SET `enabled` = 0 WHERE `id` =?';
        $param = array($id);
        $result = $this->insert($sql, $param);

        return $result;
    }

    public function getProducts()
    {
        $sql = 'SELECT * FROM `products` WHERE `enabled` = 1 ORDER BY `id` DESC';
        $result = $this->selectAll($sql);

        return ($result) ? $result : false;
    }
}
