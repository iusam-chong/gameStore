<?php

class Login extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (parent::loginStatus()) {
                parent::noPermitExist();
            }
            $this->smartyAssign();
            $this->view->render('login');
        }
    }

    private function smartyAssign()
    {
        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy - 會員登入');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('userName', 'Guest');
    }

    public function signIn()
    {
        try {
            $this->checkRequest();
            $this->checkUserName();
            $this->checkPassword();
            $this->tryLogin();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'login success.';
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

    private function checkUserName()
    {
        if (!isset($_POST['userName'])) {
            throw new Exception('登入失敗');
        }
        if (!(strlen(trim($_POST['userName'])) > 0)) {
            throw new Exception('請輸入登入帳號');
        }
        return true;
    }

    private function checkPassword()
    {
        if (!isset($_POST['password'])) {
            throw new Exception('登入失敗');
        }
        if (!(strlen(trim($_POST['password'])) > 0)) {
            throw new Exception('請輸入密碼');
        }
        return true;
    }

    private function tryLogin()
    {
        $loginData = (object) [
            'userName' => $_POST['userName'],
            'userPasswd' => $_POST['password'],
        ];

        $userData = $this->model->verifyLogin($loginData);
        if (!$userData) {
            throw new Exception('登入賬號或密碼錯誤');
        }
        if (!$this->model->checkEnable($userData)) {
            throw new Exception('賬號已被封鎖');
        }
        if (!$this->model->initCookieLogin($userData)) {
            throw new Exception('伺服器忙碌中，請稍後再試');
        }
        return true;
    }
}
