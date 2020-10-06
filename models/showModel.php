<?php

class ShowModel extends Model
{
    public function __construct()
    {
    
    }

    public function getProductImage($id)
    {
        $sql = 'SELECT `image` FROM `products` WHERE (id = ?)';
        $param = array($id);
        $result = $this->select($sql, $param);

        return $result;
    }
}