<?php

class Shop extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        $user = (parent::loginStatus()) ? $this->loginData() : $this->noLoginData();

        $this->smartyAssign($user);
        $this->view->render('shop');
    }

    private function noLoginData()
    {
        $user = [
            'user_name' => 'Hello there',
            'type' => null
        ];

        return $user;
    }

    private function loginData()
    {
        $user = $this->model->getUserData();

        return ($user) ? $user : $this->noLoginData();
    }

    private function smartyAssign($user)
    {
        $products = $this->model->getProducts();
        $smarty = $this->view->smarty;

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('products', $products);
    }
}