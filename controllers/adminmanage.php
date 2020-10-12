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
        $admins = $this->model->showAllAdmin();

        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy系統 - 後台帳號管理');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('admins', $admins);
    }

    public function newAdmin()
    {
        try {
            $this->checkRequest();
            $this->checkPostElement();
            $this->checkDataNotNull();
            $this->comparePassword();
            $this->checkUserNameExist();
            $this->createAdmin();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'Create new admin success.';
        Json::ajaxReturn(true, $message);
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
        if (!isset($_POST['userName'])) {
            throw new Exception('User name not found in POST request.');
        }

        if (!isset($_POST['password'])) {
            throw new Exception('Password not found in POST request.');
        }

        if (!isset($_POST['passwordComfrim'])) {
            throw new Exception('Password comfrim not found in POST request.');
        }
        return true;
    }

    private function checkDataNotNull()
    {
        if (!(strlen(trim($_POST['userName'])) > 0)) {
            throw new Exception('userName only have space or is null.');
        }

        if (!(strlen(trim($_POST['password'])) > 0)) {
            throw new Exception('password only have space or is null.');
        }
        return true;
    }

    private function comparePassword()
    {
        if ($_POST['password'] !== $_POST['passwordComfrim']) {
            throw new Exception('passwordConfirm not same with password.');
        }
        return true;
    }

    private function checkUserNameExist()
    {
        if ($this->model->getUser($_POST['userName'])) {
            throw new Exception('User name already exist.');
        }
        return true;
    }
    
    private function createAdmin()
    {
        $data = (object) [
            'userName' => $_POST['userName'],
            'userPasswd' => $_POST['password'],
        ];

        if (!$this->model->createAdmin($data)) {
            throw new Exception('Create admin failed.');
        }

        if (!$this->model->defaultAuth()) {
            throw new Exception('Set default auth failed.');
        }
        return true;
    }
}