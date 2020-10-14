<?php

class Shop extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if (!$this->issetPage()) {
            $this->page();
        }
    }

    private function loadPage($products, $pagination, $currentPage)
    {
        $this->view->smarty->assign('title', 'Somy - 遊戲商店');

        $this->smartyAssignUser();
        $this->smartyAssignProducts($products, $pagination, $currentPage);

        $this->view->render('shop');
    }

    private function smartyAssignUser()
    {
        $user = (parent::loginStatus()) ? $this->loginData() : $this->noLoginData();
        $userCart = (parent::loginStatus()) ? $this->model->userCartItem() : null;

        $smarty = $this->view->smarty;

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('userCart', $userCart);
    }

    private function smartyAssignProducts($products, $pagination, $currentPage)
    {
        $smarty = $this->view->smarty;

        $smarty->assign('products', $products);
        $smarty->assign('pagination', $pagination);
        $smarty->assign('currentPage', $currentPage);
    }

    public function page($page = 1)
    {
        # change this variable value will be change display product amount
        $itemPerPage = 4;

        $page = $this->checkPage($page);
        $offset = ($page - 1) * $itemPerPage;

        $currentPage = $page;
        $products = $this->model->getProducts($itemPerPage, $offset);
        if (!$products) {
            $products = $this->model->getProducts($itemPerPage, 0);
            $currentPage = 1;
        }

        $countProducts = $this->model->countProducts();
        $pagination = ceil($countProducts / $itemPerPage);

        $this->loadPage($products, $pagination, $currentPage);

        return true;
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
}