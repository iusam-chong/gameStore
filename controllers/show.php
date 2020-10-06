<?php

class Show extends Controller
{
    public function __construct($contrName)
    {
        //parent::__construct($contrName);
        parent::loadModel($contrName);
    }

    public function image($id)
    {
        $product = $this->model->getProductImage($id);
        if ($product) {
            echo $product['image'];
            return true;
        }
        return false;
    }
}