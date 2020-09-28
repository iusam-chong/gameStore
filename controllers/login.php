<?php

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->smartyAssign();
            $this->view->render('login');
        }
    }

    public function smartyAssign()
    {
        $smarty = $this->view->smarty;
        $loginStatus = true;
        $userName = ($loginStatus) ? 'JohnWick' : 'Guest';

        $smarty->assign('loginStatus', $loginStatus);
        $smarty->assign('userName', $userName);
    }

    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!(isset($_POST['userName']) && isset($_POST['password']))) {
            return false;
        }

        if (!(strlen(trim($_POST['userName'])) > 0)) {
            return false;
        }

        if (!(strlen(trim($_POST['password'])) > 0)) {
            return false;
        }

        $data = (object) [
            'userName' => $_POST['userName'],
            'userPasswd' => $_POST['password'],
        ];

        if ($this->model->manualLogin($data)) {
            echo "login";
        } else {
            echo "login failed";
            echo hash('sha256', 'your_password');
        }
    }
}
