<?php

class CartModel extends Model
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

    public function getUserCart()
    {
        $userId = $this->getUserId();

        $sql = 'SELECT products.name, products.price, products.id, carts.quantity, products.quantity AS total_quantity FROM `carts`,`products`
            WHERE carts.product_id = products.id AND products.enabled = 1 AND carts.user_id = ?';
        $param = array($userId);
        $result = $this->selectAll($sql, $param);

        return $result;
    }

    public function productExist($productId)
    {
        $sql = 'SELECT * FROM `products` WHERE (`id` = ?) AND `enabled` = 1';
        $param = array($productId);
        $result = $this->select($sql, $param);

        return $result;
    }

    public function productInCart($productId)
    {
        $userId = $this->getUserId();

        $sql = 'SELECT * FROM `carts` WHERE (`user_id` = ?) AND (`product_id` = ?)';
        $param = array($userId, $productId);
        $result = $this->select($sql, $param);

        return $result;
    }

    public function addCart($productId)
    {
        $userId = $this->getUserId();

        $sql = 'INSERT INTO `carts` (`user_id`, `product_id`) VALUES (?, ?)';
        $param = array($userId, $productId);
        $result = $this->insert($sql, $param);

        return $result;
    }

    public function deleteFromCart($productId)
    {
        $userId = $this->getUserId();

        $sql = 'DELETE FROM `carts` WHERE (`user_id` = ?) AND (`product_id` = ?)';
        $param = array($userId, $productId);
        $result = $this->insert($sql, $param);

        return $result;
    }

    public function bill()
    {
        $userId = $this->getUserId();
        $data = $this->getUserCart();

        if (!$this->newOrder($userId)) {
            return false;
        }

        $orderId = $this->getOrderId($userId);

        if (!$orderId) {
            return false;
        }

        $sql = $this->getOrderQuery($data, $orderId);
        $result = $this->insert($sql);

        if (!$result) {
            return false;
        }

        if (!$this->minusProductQuantity($data)) {
            return false;
        }

        if (!$this->clearCart()) {
            return false;
        }

        return true;
    }

    public function newOrder($userId)
    {
        $sql = 'INSERT INTO `order` (`user_id`) VALUES (?)';
        $param = array($userId);
        $result = $this->insert($sql, $param);

        return $result;
    }

    public function getOrderId($userId)
    {
        $sql = 'SELECT `id` FROM `order` WHERE (`user_id` = ?) order BY `id` DESC LIMIT 1';
        $param = array($userId);
        $result = $this->select($sql, $param);

        return ($result) ? $result['id'] : false;
    }

    public function getOrderQuery($data, $orderId)
    {
        $query = 'INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`) VALUES ';

        foreach ($data as $d) {
            $query = $query . '(' . $orderId . ',' . $d["id"] . ',' . $d["quantity"] . '),';
        }

        $sql = rtrim($query, ', ');
        return $sql;
    }

    public function minusProductQuantity($data)
    {
        foreach ($data as $product) {
            $product['total_quantity'] -= $product['quantity'];

            $sql = 'UPDATE `products` SET `quantity` = ? WHERE `id` = ?';
            $param = array($product['total_quantity'], $product['id']);
            if (!$this->insert($sql, $param)) {
                return false;
            }
        }
        return true;
    }

    public function clearCart()
    {
        $userId = $this->getUserId();
     
        $sql = 'DELETE FROM `carts` WHERE (`user_id` = ?)';
        $param = array($userId);
        $result = $this->insert($sql, $param);

        return $result;
    }

    public function modifyCartQuantity($productId, $quantity)
    {
        $userId = $this->getUserId();

        $sql = 'UPDATE `carts` SET `quantity` = ? WHERE `product_id` = ? AND `user_id` = ?';
        $param = array($quantity, $productId, $userId);

        return $this->insert($sql, $param);
    }
}
