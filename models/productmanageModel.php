<?php

class ProductManageModel extends Model
{
    public function getUserData()
    {
        $identifier = Cookie::getIdentifier();

        $sql = 'SELECT users.id, `user_name`, `type`, `enabled`, `product` FROM `users`, `auth`, `manage_auth` 
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
    
    public function insertProduct($product)
    {
        $sql = 'INSERT INTO `products` (`name`, `price`, `quantity`, `description`, `image`) VALUE (?, ?, ?, ?, ?)';
        $param = array($product->name, $product->price, $product->quantity, $product->description, $product->image);
        
        return $this->insert($sql, $param);
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
        
        return $this->insert($sql, $param);
    }

    public function disableProduct($id)
    {
        $sql = 'UPDATE `products` SET `enabled` = 0 WHERE `id` =?';
        $param = array($id);

        return $this->insert($sql, $param);
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
}
