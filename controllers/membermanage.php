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

            if ($user['type'] !== 'admin' && $user['type' !== 'superAdmin']) {
                parent::noPermitExist();
            }
            $this->smartyAssign($user);
            $this->view->renderAdmin($contrName);
        }
    }

    private function smartyAssign($user)
    {
        $member = $this->model->showAllMember();
        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy系統 - 會員管理');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('members', $member);
    }

    public function modifyStatus()
    {
        try {
            $this->checkRequest();
            $this->checkPostElement();
            $this->checkPostStatus();
            $this->checkUserExist();
            $this->setUserStatus();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $result = ($_POST['status']) ? 0 : 1; 
        $message = 'Set user status success.';

        Json::ajaxReturn(true, $message, $result);
        return true;
    }

    private function checkRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exception('Request method not POST.');
        }
        return true;
    }

    private function checkPostElement()
    {
        if (!isset($_POST['userId'])) {
            throw new Exception('User id not found in POST request.');
        }

        if (!isset($_POST['status'])) {
            throw new Exception('Status not found in POST request.');
        }
        return true;
    }

    private function checkPostStatus()
    {
        if (!preg_match('/(^[0-1]{1}$)/', $_POST['status'])) {
            throw new Exception('User status value is been illegal modify.');
        }
        return true;
    }

    private function checkUserExist()
    {
        if (!$this->model->userExist($_POST['userId'])) {
            throw new Exception('User id not found, or is been illegal modify.');
        }
        return true;
    }

    private function setUserStatus()
    {
        if (!$this->model->setStatus($_POST['userId'], $_POST['status'])) {
            throw new Exception('Set user status fail.');
        }
        return true;
    }
}