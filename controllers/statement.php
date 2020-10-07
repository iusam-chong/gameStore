<?php

class Statement extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!parent::loginStatus()) {
                parent::noPermitExist();
            }

            $user = $this->model->getUserData();

            $this->smartyAssign($user);
            $this->view->render('statement');
        }
    }

    private function smartyAssign($user)
    {
        //$carts = $this->model->getUserCart();
        //$cartTotal = $this->getCartTotal($carts);
        $statement = $this->model->getUserStatement();

        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy - 交易紀錄');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('statement', $statement);
    }
}