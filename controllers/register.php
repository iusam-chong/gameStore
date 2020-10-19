<?php

class Register extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (parent::loginStatus()) {
                parent::noPermitExist();
            }
            $this->smartyAssign();
            $this->view->render('register');
        }
    }

    private function smartyAssign()
    {
        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy - 註冊會員');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('userName', 'Guest');
    }

    public function signUp()
    {
        try {
            $this->checkRequest();
            $this->checkUserName();
            $this->checkPassword();
            $this->checkPasswordConfirm();
            $this->trySignUp();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'register success.';
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
            throw new Exception('註冊失敗');
        }
        if (!(strlen(trim($_POST['userName'])) > 0)) {
            throw new Exception('請輸入登入帳號');
        }
        if (!preg_match('/^([a-zA-Z0-9]+(\-[a-zA-Z0-9]+)?)$/', $_POST['userName'])) {
            throw new Exception('帳號格式不符');
        }
        if ($this->model->getUser($_POST['userName'])) {
            throw new Exception('該帳號已被使用');
        }
        return true;
    }

    private function checkPassword()
    {
        if (!isset($_POST['password'])) {
            throw new Exception('註冊失敗');
        }
        if (!(strlen(trim($_POST['password'])) > 0)) {
            throw new Exception('請輸入密碼');
        }
        return true;
    }

    private function checkPasswordConfirm()
    {
        if (!isset($_POST['passwordConfirm'])) {
            throw new Exception('註冊失敗');
        }
        if (!(strlen(trim($_POST['passwordConfirm'])) > 0)) {
            throw new Exception('請輸入密碼');
        }
        if ($_POST['password'] !== $_POST['passwordConfirm']) {
            throw new Exception('確認密碼與密碼不符');
        }
        return true;
    }

    private function trySignUp()
    {
        $data = (object) [
            'userName' => $_POST['userName'],
            'userPasswd' => $_POST['password'],
        ];

        if (!($this->model->createUser($data))) {
            throw new Exception('註冊失敗, 請稍候再試');
        }
    }
}
