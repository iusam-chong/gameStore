<?php

class AdminManage extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!parent::loginStatus()) {
                parent::noPermitExist();
            }

            $user = $this->model->getUserData();

            if ($user['type'] !== 'admin' && $user['type' !== 'superAdmin']) {
                parent::noPermitExist();
            }
            $this->smartyAssign($user);
            $this->view->renderAdmin($contrName);
        }
    }

    private function smartyAssign($user)
    {
        //$member = $this->model->showAllMember();
        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy系統 - 後台帳號管理');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        //$smarty->assign('members', $member);
    }
}