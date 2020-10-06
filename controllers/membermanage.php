<?php

class MemberManage extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!parent::loginStatus()) {
                parent::noPermitExist();
            }

            $user = $this->model->getUserData();

            if ($user['type'] !== 'admin') {
                parent::noPermitExist();
            }
            $this->smartyAssign($user);
            $this->view->renderAdmin('membermanage');
        }
    }

    private function smartyAssign($user)
    {
        $member = $this->model->showAllMember();
        $smarty = $this->view->smarty;

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('members', $member);
    }
}