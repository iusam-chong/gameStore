<?php

class Index extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        $user = (parent::loginStatus()) ? $this->loginData() : $this->noLoginData();

        $this->smartyAssign($user);
        $this->view->render('index');
    }

    private function noLoginData()
    {
        $user = [
            'user_name' => null,
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
        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy - 首頁');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
    }
}
